<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

//CMS

class NewsService
{
    public function upload(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('uploads/news/' . $model->file))) {
                File::delete(public_path('uploads/news/' . $model->file));
            }
            if (File::isFile(public_path('uploads/news/thumbs/' . $model->file))) {
                File::delete(public_path('uploads/news/thumbs/' . $model->file));
            }

            // WebP
            if (File::isFile(public_path('uploads/news/webp/' . $model->file_webp))) {
                File::delete(public_path('uploads/news/webp/' . $model->file_webp));
            }
            if (File::isFile(public_path('uploads/news/thumbs/webp/' . $model->file_webp))) {
                File::delete(public_path('uploads/news/thumbs/webp/' . $model->file_webp));
            }

            $this->deleteCard($model);
        }

        $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $name_webp = date('His').'_'.Str::slug($title).'.webp';

        $file->storeAs('news', $name, 'public_uploads');

        $file_path = public_path('uploads/news/' . $name);
        $file_thumb_path = public_path('uploads/news/thumbs/' . $name);

        /* fit() ponizej nadpisuje wgrany plik kadrem 16:9 — kopia przed
           przycieciem, zeby kafel 3:4 (i kazdy kolejny format) mial z czego powstac */
        File::ensureDirectoryExists(public_path('uploads/news/original'));
        // do 2400 px na dluzszym boku — zdjecia z aparatu maja po 6000 px
        Image::make($file_path)->resize(2400, 2400, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        })->save(public_path('uploads/news/original/' . $name));

        Image::make($file_path)->fit(config('images.article.big_width'), config('images.article.big_height'))->save($file_path);
        Image::make($file_path)->fit(config('images.article.thumb_width'), config('images.article.thumb_height'))->save($file_thumb_path);

        // WebP
        $file_path_webp = public_path('uploads/news/webp/' . $name_webp);
        $file_thumb_path_webp = public_path('uploads/news/thumbs/webp/' . $name_webp);

        Image::make($file_path)->encode('webp', 75)->save($file_path_webp);
        Image::make($file_thumb_path)->encode('webp', 75)->save($file_thumb_path_webp);

        $model->update([
            'file' => $name,
            'file_webp' => $name_webp
        ]);

        $this->makeCard($model);
    }

    /**
     * Kafel 3:4 na SG i liscie aktualnosci (config images.news_card).
     * Grafiki aktualnosci maja wpalony tekst, wiec nie przycinamy: cala grafika
     * idzie w gorna czesc kafla, tlo to ta sama grafika rozmyta i przyciemniona,
     * dol zostaje pod tytul. Grafika juz w proporcji ~3:4 wypelnia kafel w calosci.
     * Zrodlo: oryginal (od 10.2026), starsze wpisy maja tylko kadr 1060x596.
     */
    public function makeCard(object $model): bool
    {
        $source = collect(['original/', '', 'thumbs/'])
            ->map(fn ($dir) => public_path('uploads/news/' . $dir . $model->file))
            ->first(fn ($path) => $model->file && File::isFile($path));

        if (! $source) {
            return false;
        }

        $w = config('images.news_card.width');
        $h = config('images.news_card.height');

        $img = Image::make($source);
        $ratio = $img->width() / $img->height();

        if (abs($ratio - $w / $h) < 0.08) {
            $card = $img->fit($w, $h);
        } else {
            $img->resize($w, $h, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });

            $top = (int) round($h * config('images.news_card.focus_y') - $img->height() / 2);
            $top = max(0, min($h - $img->height(), $top));

            /* Tlo. Szablon z jednolita krawedzia (kremowy, pomaranczowy) —
               nad grafika kolor gornej krawedzi, pod nia dolnej, czyli kafel
               bez szwu. Zdjecie — ta sama klatka mocno rozmyta i przyciemniona;
               rozmywamy mala kopie kilka razy, bo jedno slabe rozmycie zostawialo
               "duchy" napisow, a blur() na pelnym rozmiarze w GD jest bardzo wolny. */
            if ($this->isFlatEdge($img, 0) && $this->isFlatEdge($img, $img->height() - 6)) {
                $topColor = $this->edgeColor($img, 0);
                $card = Image::canvas($w, $h, $this->edgeColor($img, $img->height() - 6));
                $card->rectangle(0, 0, $w, $top, fn ($draw) => $draw->background($topColor));
            } else {
                $card = (clone $img)->fit(intdiv($w, 8), intdiv($h, 8));
                for ($i = 0; $i < 4; $i++) {
                    $card->blur(40);
                }
                $card->resize($w, $h)->blur(10);
            }

            $card->insert($img, 'top-left', intdiv($w - $img->width(), 2), $top);
        }

        File::ensureDirectoryExists(public_path('uploads/news/card/webp'));
        $card->save(public_path(self::cardPath($model)), 85, 'jpg');
        $card->encode('webp', 80)->save(public_path(self::cardPath($model, true)));

        return true;
    }

    /** Sredni kolor paska 6 px od wysokosci $y */
    private function edgeColor($img, int $y): string
    {
        return (clone $img)->crop($img->width(), 6, 0, $y)->resize(1, 1)->pickColor(0, 0, 'hex');
    }

    /** Pasek 6 px od $y jest jednolity (tlo szablonu, nie zdjecie). Co najmniej
        3/4 probek blisko mediany — ozdobnik w rogu (zloty luk) nie przeszkadza. */
    private function isFlatEdge($img, int $y): bool
    {
        $strip = (clone $img)->crop($img->width(), 6, 0, $y)->resize(24, 1);
        $px = collect(range(0, 23))->map(fn ($x) => $strip->pickColor($x, 0));
        $mid = [$px->median(0), $px->median(1), $px->median(2)];

        $close = $px->filter(fn ($p) => abs($p[0] - $mid[0]) + abs($p[1] - $mid[1]) + abs($p[2] - $mid[2]) < 36)->count();

        return $close >= 18;
    }

    /** Sciezka kafla wzgledem public/ — zawsze JPG, nazwa z pola file */
    public static function cardPath(object $model, bool $webp = false): string
    {
        $base = pathinfo($model->file, PATHINFO_FILENAME);

        return $webp ? 'uploads/news/card/webp/' . $base . '.webp' : 'uploads/news/card/' . $base . '.jpg';
    }

    public function deleteCard(object $model): void
    {
        if (! $model->file) {
            return;
        }

        foreach ([self::cardPath($model), self::cardPath($model, true), 'uploads/news/original/' . $model->file] as $path) {
            if (File::isFile(public_path($path))) {
                File::delete(public_path($path));
            }
        }
    }

    public function uploadFileFacebook(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('uploads/news/share/' . $model->file_facebook))) {
                File::delete(public_path('uploads/news/share/' . $model->file_facebook));
            }
        }

        $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $file->storeAs('news/share', $name, 'public_uploads');
        $filepath = public_path('uploads/news/share/' . $name);
        Image::make($filepath)->fit(600, 314)->save($filepath);

        $model->update(['file_facebook' => $name]);
    }
}
