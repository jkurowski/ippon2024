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
            if (File::isFile(public_path('uploads/boxes/' . $model->file))) {
                File::delete(public_path('uploads/boxes/' . $model->file));
            }
        }

        $name = date('His').'_'.(Str::slug($title) ?: 'boks').'.' . $file->getClientOriginalExtension();
        $file->storeAs('boxes', $name, 'public_uploads');
        $filepath = public_path('uploads/boxes/' . $name);

        /* Bez przycinania: ten sam plik idzie do kafla 557x370 i do szerokiego
           850x370 (dwa kafle w ostatnim rzedzie), kadr robi object-fit w CSS.
           Tylko zmniejszamy do szerokosci z configu (2x najszerszego kafla). */
        Image::make($filepath)
            ->resize(config('images.box.width'), null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filepath, 85);

        $model->update(['file' => $name]);
    }
}
