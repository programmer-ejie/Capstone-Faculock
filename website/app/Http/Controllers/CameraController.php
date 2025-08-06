<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CameraController extends Controller
{
   public function uploadUserPicture(Request $request)
    {
        $filename = 'user_' . time() . '.jpg';

        // Save to storage first
        $storagePath = storage_path('app/public/user_pictures/' . $filename);
        if (!file_exists(dirname($storagePath))) {
            mkdir(dirname($storagePath), 0777, true);
        }
        file_put_contents($storagePath, $request->getContent());

        // Move to public directory
        $publicPath = public_path('user_pictures/' . $filename);
        if (!file_exists(dirname($publicPath))) {
            mkdir(dirname($publicPath), 0777, true);
        }
        copy($storagePath, $publicPath);

        // Return the public link
        $publicUrl = asset('user_pictures/' . $filename);

        return response()->json([
            'status' => 'success',
            'filename' => $filename,
            'url' => $publicUrl
        ]);
    }
}
