<?php

use Illuminate\Support\Facades\File;

function handleUpload($inputName, $model = null) {
    try {
        if( request()->hasFile($inputName) ) {

            if($model && File::exists(public_path($model->{$inputName}))) {
                File::delete(public_path($model->{$inputName}));
            }
    
            $file = request()->file($inputName);
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move( public_path('/uploads'), $filename );

            $filePath = '/uploads/' . $filename;
            return $filePath;
    
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

function deleteFileIfExist($filePath) {
    if(File::exists(public_path($filePath))) {
        File::delete(public_path($filePath));
    }
}

function handleMultipleUpload($inputName, $model = null) {
    try {
        if( request()->hasFile($inputName) ) {

            if($model && File::exists(public_path($model->{$inputName}))) {
                File::delete(public_path($model->{$inputName}));
            }
    
            $files = request()->file($inputName);
            $filenames = [];
            foreach($files as $file) {
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move( public_path('/uploads'), $filename );
                $filenames[] = '/uploads/' . $filename;
            }

            return $filenames;
    
        }
    } catch (\Exception $e) {
        throw $e;
    }
}