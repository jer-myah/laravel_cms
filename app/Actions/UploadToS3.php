<?php

namespace App\Actions;

class UploadToS3 {

    public static function imageToS3($s3_path, $file)
    {
        return $file->store($s3_path, 's3');
        // $file_name = $file->getClientOriginalName();
        // return $file->storeAs($s3_path, $file_name, 's3');
    }
}