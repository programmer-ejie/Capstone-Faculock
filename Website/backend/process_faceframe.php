<?php
$request = json_decode(file_get_contents('php://input'), true);

if (!isset($request['image'])) {
    echo json_encode(['error' => 'No image data received']);
    exit;
}

$imageData = $request['image'];


if (strpos($imageData, 'base64,') === false) {
    echo json_encode(['error' => 'Invalid image data format']);
    exit;
}

$base64 = explode(',', $imageData, 2)[1];
$base64 = str_replace(' ', '+', $base64); 
$decoded = base64_decode($base64);

if (!$decoded) {
    echo json_encode(['error' => 'Base64 decoding failed']);
    exit;
}

$imagePath = '../captured_frames/captured_frame.png';


if (!file_put_contents($imagePath, $decoded)) {
    echo json_encode(['error' => 'Failed to save the image']);
    exit;
}


$size = filesize($imagePath);
file_put_contents('../logs/image_debug.log', "Saved image size: $size bytes\n", FILE_APPEND);


$pythonPath = 'C:\\Users\\Asus\\AppData\\Local\\Programs\\Python\\Python312\\python.exe'; 
$scriptPath = '../python/process_image.py';
$command = escapeshellcmd("$pythonPath $scriptPath $imagePath 2>&1");
$output = shell_exec($command);


file_put_contents('../logs/python_raw_output.log', $output, FILE_APPEND);


$jsonStart = strpos($output, '{');
$jsonEnd = strrpos($output, '}');

if ($jsonStart !== false && $jsonEnd !== false) {
    $jsonString = substr($output, $jsonStart, $jsonEnd - $jsonStart + 1);
    $response = json_decode($jsonString, true);
} else {
    $response = null;
}


if ($response === null) {
    file_put_contents('../logs/python_error.log', "Failed to parse response: $output\n", FILE_APPEND);
    echo json_encode(['error' => 'Python script error', 'details' => $output]);
    exit;
}


header('Content-Type: application/json');
echo json_encode($response);
?>
