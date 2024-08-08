<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class InvestmentSectionService
{
    public function upload(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('investment/sections/' . $model->file))) {
                File::delete(public_path('investment/sections/' . $model->file));
            }
            // WebP
            if (File::isFile(public_path('investment/sections/webp/' . $model->file_webp))) {
                File::delete(public_path('investment/sections/webp/' . $model->file_webp));
            }
        }

        $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $name_webp = date('His').'_'.Str::slug($title).'.webp';

        $file->storeAs('sections', $name, 'investment_uploads');

        $file_path = public_path('investment/sections/' . $name);
        Image::make($file_path)
            //->fit(config('images.article.big_width'), config('images.article.big_height'))
            ->save($file_path);

        // WebP
        $file_path_webp = public_path('investment/sections/webp/' . $name_webp);
        Image::make($file_path)->encode('webp', 75)->save($file_path_webp);

        $model->update([
            'file' => $name,
            'file_webp' => $name_webp
        ]);
    }
}
