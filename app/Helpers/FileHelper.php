<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class FileHelper
{
    public static function saveFileLocally($file, $dir): string
    {
        $fileName = Str::random(10) . '.' . $file->getExtension();
        $file->move(public_path() . $dir, $fileName);
        return $dir . $fileName;
    }
}
