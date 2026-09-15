<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

//CMS
use App\Models\Boxes;

class BoxService
{
    public function upload(string $title, UploadedFile $file, object $model, bool $delete = false)
    {
        if ($delete) {
            $this->deleteFiles($model);
        }

        $base = date('His').'_'.(Str::slug($title) ?: 'boks');
        $name = $base.'.'.strtolower($file->getClientOriginalExtension());
        $nameWebp = $base.'.webp';

        $file->storeAs('boxes', $name, 'public_uploads');
        $filepath = public_path('uploads/boxes/' . $name);

        /* Kafel na SG ma 557 px szerokosci, wiec 960 px wystarcza (config
           images.box.width). Bez przycinania — kadr robi object-fit w CSS;
           mniejszy obrazek zostaje w swoim rozmiarze (upsize). */
        $image = Image::make($filepath)
            ->resize(config('images.box.width'), null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

        $image->save($filepath, 85);

        /* Kopia WebP obok — kafel podaje ja w <picture>, oryginalny format
           zostaje jako fallback. Osobny katalog jak w sliderze/aktualnosciach. */
        File::ensureDirectoryExists(public_path('uploads/boxes/webp'));
        $image->save(public_path('uploads/boxes/webp/' . $nameWebp), 80, 'webp');

        $model->update(['file' => $name, 'file_webp' => $nameWebp]);
    }

    /** Usuwa obrazek i jego kopie WebP (podmiana obrazka, usuniecie boksu). */
    public function deleteFiles(object $model): void
    {
        $paths = [
            $model->file ? 'uploads/boxes/' . $model->file : null,
            $model->file_webp ? 'uploads/boxes/webp/' . $model->file_webp : null,
        ];

        foreach (array_filter($paths) as $path) {
            if (File::isFile(public_path($path))) {
                File::delete(public_path($path));
            }
        }
    }
}
