<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function returnSuccessResponse($data = null, $status_code = Response::HTTP_OK)
    {
        return response()->json([
            'data' => $data,
            'status' => true,
        ], $status_code);
    }

    public function uploadFile($file, $path)
    {
        if ($file) {
            $fileName = md5(time().rand(1000, 1000000)).'_'.$path.'.'.$file->extension();
            Storage::disk('public')->putFileAs(
                $path,
                $file,
                $fileName
            );
            return $fileName ?? null;
        }
    }
}
