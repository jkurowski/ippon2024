<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

//CMS
use App\Models\Plan;

class CityService
{
    public function uploadHeader(string $title, UploadedFile $file, object $model, bool $delete = false)
    {
        if ($delete) {
            if (File::isFile(public_path('uploads/header/' . $model->file_header))) {
                File::delete(public_path('uploads/header/' . $model->file_header));
            }
        }

        $name = date('His').'_header-'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $file->storeAs('header', $name, 'public_uploads');

        $filepath = public_path('uploads/header/' . $name);
        Image::make($filepath)
            ->fit(
                config('images.investment.header_width'),
                config('images.investment.header_height')
            )
            ->save($filepath);

        $model->update(['file_header' => $name]);
    }

    /**
     * Kasowanie naglowka checkboxem "Usun obrazek" w formularzu miasta.
     * Po wyczyszczeniu pola podstrona /lokalizacja bierze zdjecie zapasowe
     * ze strony "Lokalizacja" (Page id 18) w CMS-ie.
     */
    public function deleteHeader(object $model): void
    {
        if ($model->file_header && File::isFile(public_path('uploads/header/' . $model->file_header))) {
            File::delete(public_path('uploads/header/' . $model->file_header));
        }

        $model->update(['file_header' => null]);
    }
}
