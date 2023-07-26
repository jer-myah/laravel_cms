<?php

namespace App\Actions;

class HandleUpload {

    public static function uploadImage($request)
    {
        $original_name = $request->file('upload')->getClientOriginalName();
        $file_name = pathinfo($original_name, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $file_name = $file_name . '_' . time() . '.' . $extension;

        $request->file('upload')->move(public_path('media'), $file_name);

        $url = asset('media/' . $file_name);

        return ['file_name' => $file_name, 'url' => $url];
    }
}