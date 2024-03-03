<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;

class FileUpload
{
    public static function upload($folder, $file)
    {
        $path = storage_path('app/public/' . $folder);
        File::exists($path) or File::makeDirectory($path);

        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);
        return $folder . '/' . $name;
    }

    public static function delete($file)
    {
        if (is_file(storage_path("app/public/" . $file))) {
            unlink(storage_path('app/public/' . $file));
        }
    }
}
