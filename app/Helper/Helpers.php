<?php

use Illuminate\Support\Facades\Storage;

function upload($file, $path)
{
    $fileName = $file->getClientOriginalName();
    $uniqueFileName = time() . '-' . $fileName;
    $logo = Storage::disk('public')->putFileAs($path, $file, $uniqueFileName);
    return  Storage::url($logo);
}
