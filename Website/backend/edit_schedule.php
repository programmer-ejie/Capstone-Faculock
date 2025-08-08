<?php
session_start();
include('../db_connection/conn.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $course_code = $_POST['course_code'];
    $course_number = $_POST['course_number'];
    $units = $_POST['units'];
    $faculty_teacher = $_POST['faculty_teacher'];
    $subject_name = $_POST['subject_name']; // Corrected variable name
    $size = $_POST['size'];
    $schedule = $_POST['schedule'];
    $department = $_POST['department'];
    $college = $_POST['college'];

    // Check if all required fields are filled
    $sql = "UPDATE schedules SET course_code='$course_code', course_number='$course_number', units='$units', faculty_teacher='$faculty_teacher', subject_name='$subject_name', size='$size', schedule='$schedule', department='$department', college='$college' WHERE id = {$_POST['id']}";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        header("Location: ../admin/schedules.php?editStatus=success");
        exit;
    } else {
        header("Location: ../admin/schedules.php?editStatus=fail");
        exit;
    }
} else {
    echo "Invalid request method.";
}
?>