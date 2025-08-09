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
       $filter_department = isset($_POST['filter_department']) ? $_POST['filter_department'] : '';
        $sort_date = isset($_POST['sort_date']) ? $_POST['sort_date'] : '';
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $query = "editStatus=success&filter_department=$filter_department&sort_date=$sort_date&page=$page";
        header("Location: ../admin/schedules.php?$query");
        exit;
    } else {
        $filter_department = isset($_POST['filter_department']) ? $_POST['filter_department'] : '';
        $sort_date = isset($_POST['sort_date']) ? $_POST['sort_date'] : '';
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $query = "editStatus=fail&filter_department=$filter_department&sort_date=$sort_date&page=$page";
        header("Location: ../admin/schedules.php?$query");
        exit;
    }
} else {
    echo "Invalid request method.";
}
?>