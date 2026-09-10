<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Slajdy hero: z jednego wgranego pliku robi cala serie rozmiarow.
 *
 * Uklad na dysku (nazwa pliku ta sama we wszystkich katalogach, zeby dalo sie
 * ja wyliczyc z jednej kolumny w bazie):
 *
 *   uploads/slider/source/<nazwa>   oryginal, nietkniety — zrodlo przy regeneracji
 *   uploads/slider/<nazwa>          kopia najwiekszego kadru (zgodnosc ze starymi szablonami)
 *   uploads/slider/1920/<nazwa>     \
 *   uploads/slider/1440/<nazwa>      > seria z config('images.slider.sizes')
 *   uploads/slider/1024/<nazwa>     /
 *   uploads/slider/mobile/<nazwa>   kadr pionowy 4/5 (osobny upload)
 *   uploads/slider/thumbs/<nazwa>   miniaturka "nastepny slajd" w nawigacji
 *
 * Obok kazdego JPG-a lezy blizniaczy .webp o tej samej nazwie bazowej.
 */
class SliderService
{
    private const JPEG_QUALITY = 88;
    private const WEBP_QUALITY = 80;

    /** Miniaturka i webp powstaja z oryginalu, nie z przycietego 1920 — inaczej
     *  kazdy kolejny rozmiar dziedziczy artefakty poprzedniego. */
    public function upload(string $title, UploadedFile $file, object $model, bool $delete = false)
    {
        if ($delete) {
            $this->deleteFiles($model);
        }

        $name = $this->uniqueName($title, $file->getClientOriginalExtension());

        $file->storeAs('slider/source', $name, 'public_uploads');
        $source = public_path(config('images.slider.source_file_path') . $name);

        foreach (config('images.slider.sizes') as $dir => $box) {
            $this->render($source, 'uploads/slider/' . $dir . '/', $name, $box['width'], $box['height']);
        }

        $this->render(
            $source,
            config('images.slider.thumb_file_path'),
            $name,
            config('images.slider.thumb_width'),
            config('images.slider.thumb_height')
        );

        /* Stare szablony i lista w adminie siegaja po uploads/slider/<nazwa>
           bez podkatalogu — trzymamy tam najwiekszy kadr z serii. */
        $biggest = array_key_first(config('images.slider.sizes'));
        File::copy(
            public_path('uploads/slider/' . $biggest . '/' . $name),
            public_path(config('images.slider.file_path') . $name)
        );

        $model->update([
            'file' => $name,
            'file_webp' => $this->webpName($name),
        ]);
    }

    public function uploadMobile(string $title, UploadedFile $file, object $model, bool $delete = false)
    {
        if ($delete && $model->file_mobile) {
            $this->forget(config('images.slider.mobile_file_path'), $model->file_mobile);
        }

        $name = $this->uniqueName($title, $file->getClientOriginalExtension());

        $file->storeAs('slider/mobile-source', $name, 'public_uploads');
        $source = public_path('uploads/slider/mobile-source/' . $name);

        $this->render(
            $source,
            config('images.slider.mobile_file_path'),
            $name,
            config('images.slider.mobile_width'),
            config('images.slider.mobile_height')
        );

        $model->update(['file_mobile' => $name]);
    }

    /**
     * Przegenerowanie serii dla slajdu, ktory juz jest w bazie — bez ponownego
     * wgrywania pliku. Uzywa oryginalu, a gdy go nie ma (slajdy sprzed zmiany),
     * bierze najwiekszy plik, jaki zostal.
     */
    public function regenerate(object $model): bool
    {
        if (!$model->file) {
            return false;
        }

        $source = $this->findSource($model->file);

        if (!$source) {
            return false;
        }

        foreach (config('images.slider.sizes') as $dir => $box) {
            $this->render($source, 'uploads/slider/' . $dir . '/', $model->file, $box['width'], $box['height']);
        }

        $this->render(
            $source,
            config('images.slider.thumb_file_path'),
            $model->file,
            config('images.slider.thumb_width'),
            config('images.slider.thumb_height')
        );

        if ($model->file_mobile) {
            $mobileSource = $this->firstExisting([
                'uploads/slider/mobile-source/' . $model->file_mobile,
                config('images.slider.mobile_file_path') . $model->file_mobile,
            ]);

            if ($mobileSource) {
                $this->render(
                    $mobileSource,
                    config('images.slider.mobile_file_path'),
                    $model->file_mobile,
                    config('images.slider.mobile_width'),
                    config('images.slider.mobile_height')
                );
            }
        }

        $model->update(['file_webp' => $this->webpName($model->file)]);

        return true;
    }

    /** Kasowanie rekordu ma zabierac ze soba pliki — inaczej uploads/slider
     *  zarasta seriami po nieistniejacych slajdach. */
    public function deleteFiles(object $model)
    {
        if ($model->file) {
            $dirs = array_merge(
                [
                    config('images.slider.source_file_path'),
                    config('images.slider.file_path'),
                    config('images.slider.thumb_file_path'),
                ],
                array_map(fn ($dir) => 'uploads/slider/' . $dir . '/', array_keys(config('images.slider.sizes')))
            );

            foreach ($dirs as $dir) {
                $this->forget($dir, $model->file);
            }
        }

        if ($model->file_mobile) {
            $this->forget('uploads/slider/mobile-source/', $model->file_mobile);
            $this->forget(config('images.slider.mobile_file_path'), $model->file_mobile);
        }
    }

    /* ------------------------------------------------------------------ */

    /** Jeden kadr + jego webp. `upsize()` pilnuje, zeby male zrodlo nie zostalo
     *  rozdmuchane do rozmiaru docelowego — lepszy mniejszy plik niz mydlo.
     *
     *  Jakosc idzie drugim argumentem save(), nie przez encode(): save() koduje
     *  jeszcze raz po rozszerzeniu sciezki i gubi to, co ustawil encode().
     *  Przy webp 80 plik jest o ~1/3 lzejszy od JPG-a 88 — przy 88 byl ciezszy. */
    private function render(string $source, string $dir, string $name, int $width, int $height)
    {
        $path = public_path($dir);

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $image = Image::make($source)->fit($width, $height, function ($constraint) {
            $constraint->upsize();
        });

        $image->save($path . $name, self::JPEG_QUALITY);
        $image->save($path . $this->webpName($name), self::WEBP_QUALITY);
    }

    private function findSource(string $name): ?string
    {
        $candidates = [config('images.slider.source_file_path') . $name];

        foreach (array_keys(config('images.slider.sizes')) as $dir) {
            $candidates[] = 'uploads/slider/' . $dir . '/' . $name;
        }

        $candidates[] = config('images.slider.file_path') . $name;

        return $this->firstExisting($candidates);
    }

    private function firstExisting(array $paths): ?string
    {
        foreach ($paths as $path) {
            if (File::isFile(public_path($path))) {
                return public_path($path);
            }
        }

        return null;
    }

    private function forget(string $dir, string $name)
    {
        foreach ([$name, $this->webpName($name)] as $file) {
            if (File::isFile(public_path($dir . $file))) {
                File::delete(public_path($dir . $file));
            }
        }
    }

    /** date('His') potrafilo sie powtorzyc przy dwoch slajdach wgranych w tej
     *  samej sekundzie — wtedy drugi nadpisywal pliki pierwszego. */
    private function uniqueName(string $title, string $extension): string
    {
        $slug = Str::slug($title) ?: 'slajd';

        return date('His') . '-' . Str::lower(Str::random(4)) . '_' . $slug . '.' . Str::lower($extension);
    }

    private function webpName(string $name): string
    {
        return pathinfo($name, PATHINFO_FILENAME) . '.webp';
    }
}
