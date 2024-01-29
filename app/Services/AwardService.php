<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AwardService
{
    public function upload(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('uploads/awards/' . $model->file))) {
                File::delete(public_path('uploads/awards/' . $model->file));
            }
        }

        $name = date('His') . '_' . Str::slug($title) . '.' . $file->getClientOriginalExtension();
        $name_webp = date('His') . '_' . Str::slug($title) . '.webp';
        $file->storeAs('awards', $name, 'public_uploads');

        $filepath = public_path('uploads/awards/' . $name);

        Image::make($filepath)
            ->resize(
                380,
                200,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save($filepath);

        $model->update([
            'file' => $name
        ]);
    }
}
