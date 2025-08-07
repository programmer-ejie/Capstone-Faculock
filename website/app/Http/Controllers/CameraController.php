<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CameraController extends Controller
{
   public function uploadUserPicture(Request $request)
{
    $filename = 'user_' . time() . '.jpg';

    // Save image in storage/app/public/user_pictures
    Storage::disk('public')->put('user_pictures/' . $filename, $request->getContent());
    $publicUrl = Storage::url('user_pictures/' . $filename);

    // Define paths
    $imagePath = storage_path('app/public/user_pictures/' . $filename);
    $embeddingsPath = base_path('python/face/user_embeddings.pkl');  // ✅ you're correct to put it here
    $pythonScript = base_path('python/face_recognation.py');

    // Build and run the command
    $command = escapeshellcmd("python \"$pythonScript\" \"$imagePath\" \"$embeddingsPath\"");
    $output = shell_exec($command);

    if ($output === false || $output === null) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to execute Python script or no output.',
        ]);
    }

    // Parse output and extract valid JSON
    $lines = explode("\n", trim($output));
    $jsonLine = null;
    foreach ($lines as $line) {
        $decoded = json_decode($line, true);
        if ($decoded !== null) {
            $jsonLine = $decoded;
            break;
        }
    }

    if ($jsonLine === null) {
        return response()->json([
            'status' => 'error',
            'message' => 'Python script output is not valid JSON.',
            'raw_output' => $output
        ]);
    }

    return response()->json([
        'status' => 'success',
        'data' => $jsonLine,
        'image_url' => $publicUrl, // Optional: include URL to the saved image
        'filename' => $filename
    ]);
}


    
}
