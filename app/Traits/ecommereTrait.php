<?php


namespace App\Traits;


trait ecommereTrait
{

    function saveImage($photo, $path)
    {
        $file_name = time() . $photo->getClientOriginalName();
        $photo->move($path, $file_name);
        return $file_name;
    }

    function deletImage($path, $photo)
    {
        $file_path = public_path($path . $photo);
        if (file_exists($file_path))
            unlink($file_path);

    }


}
