<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;

class ImageService {


    public function storeImage($file, $path, $previewsName){

        if($file == null || empty($file)) return null;

        // if(!ImageService::endsWith($path,'/')) $path = $path . '/';

        $fileName = time() . '_' . $file->getClientOriginalName();
        // Now Store file to the particular path
        $imagePath = $file->storeAs($path, $fileName ,'public');

        // if profile already exist.
        if(Storage::disk('public')->exists($path . $previewsName)){
            ImageService::deleteImage($path . $previewsName);
        }

        return  $fileName;
    }

    public function endsWith($string, $ending) {
        $length = strlen($ending);
        return substr_compare($string, $ending, -$length) === 0;
    }


    public function deleteImage($path){

        if(Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
        }
    }
}