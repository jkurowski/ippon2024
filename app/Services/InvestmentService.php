<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

//CMS
use App\Models\Plan;

class InvestmentService
{
    public function uploadThumb(string $title, UploadedFile $file, object $model, bool $delete = false)
    {
        try {
            if ($delete) {
                if (File::isFile(public_path('investment/thumbs/' . $model->file_thumb))) {
                    if (!File::delete(public_path('investment/thumbs/' . $model->file_thumb))) {
                        throw new \Exception('Failed to delete the existing thumbnail.');
                    }
                }
            }

            $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
            $name_webp = date('His') . '_' . Str::slug($title) . '.webp';

            $file->storeAs('thumbs', $name, 'investment_uploads');

            $filepath = public_path('investment/thumbs/' . $name);
            Image::make($filepath)
                ->fit(
                    config('images.investment.thumb_width'),
                    config('images.investment.thumb_height')
                )
                ->save($filepath);

            $file_path_webp = public_path('investment/thumbs/webp/' . $name_webp);
            Image::make($filepath)->encode('webp')->save($file_path_webp);

            $model->update(['file_thumb' => $name, 'file_webp' => $name_webp]);

            return ['success' => true, 'message' => 'Thumbnail uploaded successfully.'];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function uploadLogo(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('investment/logo/' . $model->file_logo))) {
                File::delete(public_path('investment/logo/' . $model->file_logo));
            }
        }

        $name = date('His').'_logo-'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $file->storeAs('logo', $name, 'investment_uploads');

        $filepath = public_path('investment/logo/' . $name);
        Image::make($filepath)
            ->fit(
                config('images.investment.logo_width'),
                config('images.investment.logo_height')
            )
            ->save($filepath);

        $model->update(['file_logo' => $name]);
    }

    public function uploadHeader(string $title, UploadedFile $file, object $model, bool $delete = false)
    {
        if ($delete) {
            if (File::isFile(public_path('investment/header/' . $model->file_header))) {
                File::delete(public_path('investment/header/' . $model->file_header));
            }
        }

        $name = date('His').'_header-'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $file->storeAs('header', $name, 'investment_uploads');

        $filepath = public_path('investment/header/' . $name);
        Image::make($filepath)
            ->fit(
                config('images.investment.header_width'),
                config('images.investment.header_height')
            )
            ->save($filepath);

        $model->update(['file_header' => $name]);
    }

    /**
     * Zdjecia wgrywane BEZ przycinania — klient przygotowuje kadr sam, tu tylko
     * zmniejszamy do szerokosci z configu. Obok kazdego pliku powstaje WebP
     * (webp/<nazwa>.webp), a duza miniatura dostaje tez wersje na telefon
     * (mobile/<nazwa> + mobile/webp/). Nazwy wersji wynikaja z nazwy pliku —
     * odczytuje je helper investmentLargeImage().
     */
    private const LARGE_IMAGES = [
        'file_list_thumb'   => ['dir' => 'list',         'width' => 'list_thumb_width',   'mobile' => 'list_thumb_mobile_width'],
        'file_slide'        => ['dir' => 'slide',        'width' => 'slide_width',        'mobile' => null],
        'file_slide_mobile' => ['dir' => 'slide/mobile', 'width' => 'slide_mobile_width', 'mobile' => null],
    ];

    public function uploadLarge(string $title, UploadedFile $file, object $model, string $field, bool $delete = false)
    {
        $cfg  = self::LARGE_IMAGES[$field];
        $dirs = $cfg['mobile'] ? [$cfg['dir'], $cfg['dir'].'/mobile'] : [$cfg['dir']];

        if ($delete && $model->$field) {
            $old = pathinfo($model->$field, PATHINFO_FILENAME);
            foreach ($dirs as $dir) {
                File::delete([
                    public_path('investment/'.$dir.'/'.$model->$field),
                    public_path('investment/'.$dir.'/webp/'.$old.'.webp'),
                ]);
            }
        }

        $base = date('His').'_'.basename($cfg['dir']).'-'.Str::slug($title);
        $name = $base.'.'.strtolower($file->getClientOriginalExtension());
        $file->storeAs($cfg['dir'], $name, 'investment_uploads');

        $source = public_path('investment/'.$cfg['dir'].'/'.$name);

        // najpierw mobile — liczone z oryginalu, zanim glowny plik zostanie zmniejszony
        if ($cfg['mobile']) {
            $this->saveLargeVersion($source, $cfg['dir'].'/mobile', $name, $base, config('images.investment.'.$cfg['mobile']));
        }
        $this->saveLargeVersion($source, $cfg['dir'], $name, $base, config('images.investment.'.$cfg['width']));

        $model->update([$field => $name]);
    }

    /** Zmniejsza (bez przycinania) do $width i zapisuje obok wersje WebP. */
    private function saveLargeVersion(string $source, string $dir, string $name, string $base, int $width): void
    {
        File::ensureDirectoryExists(public_path('investment/'.$dir.'/webp'));

        $image = Image::make($source)->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save(public_path('investment/'.$dir.'/'.$name), 85);
        $image->encode('webp', 82)->save(public_path('investment/'.$dir.'/webp/'.$base.'.webp'));
    }

    public function uploadPlan(object $model, UploadedFile $file)
    {

        if ($model->plan()->exists()) {
            if (File::isFile(public_path('investment/plan/' . $model->plan()->first()->file))) {
                File::delete(public_path('investment/plan/' . $model->plan()->first()->file));
            }
        }

        $name = date('His') . '_' . Str::slug($model->name) . '.' . $file->getClientOriginalExtension();
        $name_webp = date('His') . '_' . Str::slug($model->name) . '.webp';

        $file->storeAs('plan', $name, 'investment_uploads');

        $filepath = public_path('investment/plan/' . $name);
        Image::make($filepath)->resize(
            config('images.plan.width'),
            config('images.plan.height'),
            function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filepath);

        $file_path_webp = public_path('investment/plan/webp/' . $name_webp);
        Image::make($filepath)->encode('webp')->save($file_path_webp);

        Plan::updateOrCreate(
            ['investment_id' => $model->id],
            ['file' => $name],
            ['file_webp' => $name_webp]
        );
    }

    public function uploadBrochure(string $title, UploadedFile $file, object $model, bool $delete = false)
    {
        if ($delete && !empty($model->file_brochure)) {
            $brochurePath = public_path('investment/brochure/' . $model->file_brochure);

            if (File::exists($brochurePath) && File::isFile($brochurePath)) {
                File::delete($brochurePath);
            }
        }

        $name = date('His') . '_' . Str::slug($title) . '.' . $file->getClientOriginalExtension();

        // Save file to public/investment/brochure
        $file->move(public_path('investment/brochure'), $name);

        // Update model
        $model->update(['file_brochure' => $name]);
    }
}
