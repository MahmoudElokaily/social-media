<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;

class SaveImage {
    public static function SaveImage($photo , $folder){
        if (request()->has($photo)){
            $photo = current(request()->only($photo));
            $file_extension = $photo->getClientOriginalExtension();
            $file_name  = time() . '.' .$file_extension;
            return Storage::putFileAs($folder , $photo->path() , $file_name);
        }
        return false;
    }
}
