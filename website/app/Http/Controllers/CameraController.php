<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Schedule;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CameraController extends Controller
{
        public function uploadUserPicture(Request $request)
            {
                $filename = 'user_' . time() . '.jpg';
                Storage::disk('public')->put('user_pictures/' . $filename, $request->getContent());
                $publicUrl = Storage::url('user_pictures/' . $filename);

                $imagePath = storage_path('app/public/user_pictures/' . $filename);
                $embeddingsPath = base_path('python/face/user_embeddings.pkl');
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

                $access = 'denied';
                $room = '';
                $timeRange = '';
                $message = 'No valid schedule found.';

                if (isset($jsonLine['prediction'][0]['label'])) {
                    $label = trim($jsonLine['prediction'][0]['label']);
                    $schedules = Schedule::where('faculty_teacher', $label)->get();

                    $dayMap = [
                        'Sun' => 'Su',
                        'Mon' => 'M',
                        'Tue' => 'T',
                        'Wed' => 'W',
                        'Thu' => 'Th',
                        'Fri' => 'F',
                        'Sat' => 'Sa',
                    ];

                    $currentDay = $dayMap[Carbon::now()->format('D')] ?? '';
                    $currentTime = Carbon::now()->format('H:i');

                    foreach ($schedules as $schedule) {
                        $scheduleStr = $schedule->schedule;

                        if (preg_match('/(\b[\w-]+\b)\s+([A-Za-z]+)\s+(\d{1,2}:\d{2}\s*[APMapm]{2})\s+(\d{1,2}:\d{2}\s*[APMapm]{2})/', $scheduleStr, $matches)) {
                            $roomMatch = $matches[1];
                            $daysStr = $matches[2];
                            $start = date('H:i', strtotime($matches[3]));
                            $end = date('H:i', strtotime($matches[4]));

                            $parsedDays = [];
                            $pos = 0;
                            while ($pos < strlen($daysStr)) {
                                $part = substr($daysStr, $pos, 2);
                                if (in_array($part, ['Th', 'Su', 'Sa'])) {
                                    $parsedDays[] = $part;
                                    $pos += 2;
                                } else {
                                    $parsedDays[] = substr($daysStr, $pos, 1);
                                    $pos += 1;
                                }
                            }

                            if (in_array($currentDay, $parsedDays)) {
                                $matchFound = false;

                                if ($start < $end) {
                                    if ($currentTime >= $start && $currentTime <= $end) {
                                        $matchFound = true;
                                    }
                                } else {
                                    if ($currentTime >= $start || $currentTime <= $end) {
                                        $matchFound = true;
                                    }
                                }

                                if ($matchFound) {
                                    $access = 'granted';
                                    $room = $roomMatch;
                                    $timeRange = date('h:i A', strtotime($matches[3])) . ' - ' . date('h:i A', strtotime($matches[4]));
                                    $message = 'Access Granted';
                                    break;
                                }
                            }
                        }
                    }
                }

                return response()->json([
                    'status' => 'success',
                    'data' => $jsonLine,
                    'access' => $access,
                    'image_url' => $publicUrl,
                    'filename' => $filename,
                    'room' => $room,
                    'time' => $timeRange,
                    'message' => $message
                ]);
            }


    
}
