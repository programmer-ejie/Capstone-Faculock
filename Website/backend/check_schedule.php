<?php
include('../db_connection/conn.php');
date_default_timezone_set('Asia/Manila');

$input = json_decode(file_get_contents('php://input'), true);
$name = trim($input['name']);

$response = [
    'status' => 'denied',
    'faculty' => $name,
    'room' => '',
    'time' => '',
    'message' => 'No valid schedule found.'
];


$dayMap = [
    'Sun' => 'Su',
    'Mon' => 'M',
    'Tue' => 'T',
    'Wed' => 'W',
    'Thu' => 'Th',
    'Fri' => 'F',
    'Sat' => 'Sa'
];

$currentDay = $dayMap[date('D')] ?? '';
$currentTime = date('H:i');

$sql = "SELECT * FROM schedules WHERE faculty_teacher = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $schedule = $row['schedule'];

   
    if (preg_match('/(\b[A-Za-z0-9-]+\b)\s+([A-Za-z]+)\s+(\d{1,2}:\d{2}\s*[APMapm]{2})\s+(\d{1,2}:\d{2}\s*[APMapm]{2})/', $schedule, $matches)) {
        $room = $matches[1];
        $days = $matches[2];
        $startTime = date('H:i', strtotime($matches[3]));
        $endTime = date('H:i', strtotime($matches[4]));

        if (strpos($days, $currentDay) !== false) {
            $matchFound = false;

            if ($startTime < $endTime) {
              
                if ($currentTime >= $startTime && $currentTime <= $endTime) {
                    $matchFound = true;
                }
            } else {
                
                if ($currentTime >= $startTime || $currentTime <= $endTime) {
                    $matchFound = true;
                }
            }

            if ($matchFound) {
                $response['status'] = 'granted';
                $response['room'] = $room;
                $response['time'] = date('h:i A', strtotime($matches[3])) . ' - ' . date('h:i A', strtotime($matches[4]));
                $response['message'] = 'Access Granted';
                break;
            }
        }
    }
}

echo json_encode($response);
