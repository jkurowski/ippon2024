<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class PromotionService
{
    public function upload(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('uploads/promotions/' . $model->file))) {
                File::delete(public_path('uploads/promotions/' . $model->file));
            }
        }

        $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $file->storeAs('promotions', $name, 'public_uploads');
        $filepath = public_path('uploads/promotions/' . $name);

        Image::make($filepath)
            ->fit(
                265,
                199
            )->save($filepath);

        $model->update(['file' => $name]);
    }
}
