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
    if (!empty($course_code) && !empty($course_number) && !empty($units) && !empty($faculty_teacher) && !empty($subject_name) && !empty($size) && !empty($schedule) && !empty($department) && !empty($college)) {
        // Sanitize the input data
        $course_code = mysqli_real_escape_string($conn, $course_code);
        $course_number = mysqli_real_escape_string($conn, $course_number);
        $units = mysqli_real_escape_string($conn, $units);
        $faculty_teacher = mysqli_real_escape_string($conn, $faculty_teacher);
        $subject_name = mysqli_real_escape_string($conn, $subject_name); // Corrected variable name
        $size = mysqli_real_escape_string($conn, $size);
        $schedule = mysqli_real_escape_string($conn, $schedule);
        $department = mysqli_real_escape_string($conn, $department);
        $college = mysqli_real_escape_string($conn, $college);

        // Insert the schedule into the database
        $sql = "INSERT INTO schedules (course_code, course_number, units, faculty_teacher, subject_name, size, schedule, department, college) 
                VALUES ('$course_code', '$course_number', '$units', '$faculty_teacher', '$subject_name', '$size', '$schedule', '$department', '$college')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../admin/schedules.php?addStatus=success");
            exit;
        } else {
            header("Location: ../admin/schedules.php?addStatus=fail");
            exit;
        }
    } else {
        // Redirect to schedules.php with uncompleteData status
        header("Location: ../admin/schedules.php?addStatus=uncompleteData");
        exit;
    }
} else {
    echo "Invalid request method.";
}
?>