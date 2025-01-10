<?php

namespace App\Http\Controllers;

class imagesHandler extends Controller
{
    public function imageDriverSelector()
    {
        $base_driver = 'public_web_url';

        if (config('app.env') == 'staging') {
            $base_driver = 'public_web_url';
        } elseif (config('app.env') == 'production') {
            $base_driver = 'public_web_url';
        } elseif (config('app.env') == 'cloudways_staging' || config('app.env') == 'cloudways_production') {
            $base_driver = 'sftp';
        }
        return $base_driver;
    }

    // Upload File to public/media/products/images
    function uploadAndGetPath($file, $path = "\storage\app\public\media\products\images")
    {
        $image = $file;
        $actual_image = $image->getClientOriginalName();
        $filename_image = time() . '_' . $actual_image;
        $path = $image->storeAs($path, $filename_image, $this->imageDriverSelector());
        //$path = $file->store($path);
        // Remove /public from $path
        //$path = substr($path, 7);
        return "media/products/images/" . $filename_image;
    }
    // Upload File to public/media/vendor
    function uploadImageAndGetPath($file, $path = "\storage\app\public\media\Vendor")
    {
        $image = $file;
        $actual_image = $image->getClientOriginalName();
        $filename_image = time() . '_' . $actual_image;
        $path = $image->storeAs($path, $filename_image, $this->imageDriverSelector());
        return "media/Vendor/" . $filename_image;
    }

    // Upload File to public/media/vendor/files
    function uploadFileAndGetPath($file, $path = "\storage\app\public\media\Vendor\Files")
    {
        $actual_file = $file->getClientOriginalName();
        $filename = time() . '_' . $actual_file;
        $path = $file->storeAs($path, $filename, $this->imageDriverSelector());
        return "media/Vendor/Files/" . $filename;
    }
}
