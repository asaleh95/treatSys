<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

trait FileTrait
{
    public function uploadFile($file, $path)
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $file)) {
            $file = substr($file, strpos($file, ',') + 1);
        }
        $file = base64_decode($file);
        return Storage::put('public/' . $path, $file);
    }
}
