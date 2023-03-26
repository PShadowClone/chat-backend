<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('upload_file')) {
    /**
     * upload file
     * @param $file
     * @param $path
     * @param $driver
     * @return bool
     * @author Amr
     */
    function upload_file($file, $path = '', $driver = 'public')
    {
        if (!$file)
            throw new \Illuminate\Contracts\Filesystem\FileNotFoundException();
        return Storage::disk($driver)->put($path, $file);
    }
}
if (!function_exists('delete_file')) {
    /**
     * delete file
     * @param $path
     * @param $driver
     * @return bool|null
     * @author Amr
     */
    function delete_file($path, $driver = 'public')
    {
        try {
            return Storage::drive($driver)->delete($path);
        } catch (Exception|TypeError $exception) {
            logger($exception);
            return null;
        }
    }
}
if (!function_exists('storage_assets')) {
    /**
     * return assets path bind with storage prefix
     * @param $path
     * @return string
     * @author Amr
     */
    function storage_assets($path)
    {
        return asset('storage/' . $path);
    }
}

