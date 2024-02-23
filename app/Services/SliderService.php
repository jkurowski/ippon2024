<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class SliderService
{
    public function upload(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('uploads/slider/' . $model->file))) {
                File::delete(public_path('uploads/slider/' . $model->file));
            }

            if (File::isFile(public_path('uploads/slider/thumbs/' . $model->file))) {
                File::delete(public_path('uploads/slider/thumbs/' . $model->file));
            }

            if (File::isFile(public_path('uploads/slider/webp/' . $model->file_webp))) {
                File::delete(public_path('uploads/slider/webp/' . $model->file_webp));
            }
        }

        $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $name_webp = date('His') . '_' . Str::slug($title) . '.webp';
        $file->storeAs('slider', $name, 'public_uploads');

        $filepath = public_path('uploads/slider/' . $name);
        $thumb_filepath = public_path('uploads/slider/thumbs/' . $name);
        $file_webp = public_path('uploads/slider/webp/' . $name_webp);

        Image::make($filepath)
            ->fit(
                config('images.slider.big_width'),
                config('images.slider.big_height')
            )->save($filepath);

        Image::make($filepath)
            ->fit(
                config('images.slider.thumb_width'),
                config('images.slider.thumb_height')
            )->save($thumb_filepath);

        Image::make($filepath)->encode('webp', 90)->save($file_webp);

        $model->update(['file' => $name, 'file_webp' => $name_webp]);
    }

    public function uploadMobile(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('uploads/slider/mobile/' . $model->file_mobile))) {
                File::delete(public_path('uploads/slider/mobile/' . $model->file_mobile));
            }
        }

        $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $name_webp = date('His') . '_' . Str::slug($title) . '.webp';
        $file->storeAs('slider/mobile', $name, 'public_uploads');

        $filepath = public_path('uploads/slider/mobile/' . $name);

        Image::make($filepath)
            ->fit(800,800)
            ->save($filepath);

        $model->update(['file_mobile' => $name]);
    }
}
