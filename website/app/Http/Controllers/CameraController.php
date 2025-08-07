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

            $imagePath = storage_path('app/public/user_pictures/' . $filename);
            $embeddingsPath = storage_path('app/face/user_embeddings.pkl');
            $pythonScript = base_path('python/face_recognation.py');

            $command = escapeshellcmd("python \"$pythonScript\" \"$imagePath\" \"$embeddingsPath\"");
           $output = shell_exec($command);

            if ($output === false || $output === null) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to execute Python script or no output.',
                ]);
            }

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
                'data' => $jsonLine
            ]);

    }

    
}
