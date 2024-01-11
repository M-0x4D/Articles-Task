<?php

use Illuminate\Support\Facades\File;

function handleResponse(array $data)
{
    if ($data['errors'] !== null) {
        $response =
            [
                'status' => $data['status'],
                'message' => $data['message'],
                'errors' => $data['errors'],
                'result' => $data['result'],
                'data' => $data['data']

            ];
    } else {
        $response =
            [
                'status' => $data['status'],
                'message' => $data['message'],
                'result' => $data['result'],
                'data' => $data['data']

            ];
    }



    return response()->json($response);
}


function uploadFile($files, $url = 'files', $key = 'file', $model = null)
{
    $dist = storage_path('app/public/' . $url);
    if ($url != 'images' && !File::isDirectory(storage_path('app/public/files/' . $url . "/"))) {
        File::makeDirectory(storage_path('app/public' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR), 0777, true);
        $dist = storage_path('app/public' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $url . DIRECTORY_SEPARATOR);
    } elseif (File::isDirectory(storage_path('app/public/files/' . $url . "/"))) {
        $dist = storage_path('app/public/files/' . $url . "/");
    }
    $file = '';

    if (gettype($files) == 'array') {
        $file = [];
        foreach ($files as $new_file) {
            $file_name = time() . "___file_" . $new_file->getClientOriginalName();
            if ($new_file->move($dist, $file_name)) {
                $file[][$key] = $file_name;
            }
        }
    } else {
        $file = $files;
        $file_name = time() . "___file_" . $file->getClientOriginalName();
        if ($file->move($dist, $file_name)) {
            $file =  $file_name;
        }
    }

    return $file;
}
