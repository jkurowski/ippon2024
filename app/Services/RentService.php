<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class RentService
{
    public function upload(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('uploads/rents/' . $model->file))) {
                File::delete(public_path('uploads/rents/' . $model->file));
            }
        }

        $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $file->storeAs('rents', $name, 'public_uploads');
        $filepath = public_path('uploads/rents/' . $name);

        Image::make($filepath)->resize(1140, 590, function ($constraint) {
            $constraint->aspectRatio();
        })->save($filepath);

        $model->update(['file' => $name]);
    }
}
