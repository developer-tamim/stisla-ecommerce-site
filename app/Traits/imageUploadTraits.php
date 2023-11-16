<?php

namespace App\Traits;

use File;
use Illuminate\Http\Request;

trait ImageUploadTraits{
    public function uploadImage(Request $request, $inputName, $path){
        if($request->hasFile($inputName)){


            $image = $request->$inputName;
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqid() . '.' .$ext;
            $image->move(public_path($path), $imageName);

            $path = "/uploads/".$imageName;

            return $path.'/'.$imageName;
        }
    }

    public function updateImage(Request $request, $inputName, $path, $oldPath=null){
        if($request->hasFile($inputName)){
            if (File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }


            $image = $request->$inputName;
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqid() . '.' .$ext;
            $image->move(public_path($path), $imageName);

            $path = "/uploads/".$imageName;

            return $path.'/'.$imageName;
        }
    }
}