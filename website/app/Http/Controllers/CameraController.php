<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CameraController extends Controller
{
    function uploadUserPicture(Request $request)
    {
            $filename = 'user_' . time() . '.jpg';
            Storage::disk('public')->put('user_pictures/' . $filename, $request->getContent());
            $publicUrl = Storage::url('user_pictures/' . $filename);

            return response()->json([
                'status' => 'success',
                'filename' => $filename,
                'url' => $publicUrl
            ]);
    }

    
}
