<?php
    include('../db_connection/conn.php');
    session_start();


    $id = $_GET['id'];
    $sql = "DELETE FROM schedules WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../admin/schedules.php?deleteStatus=success");
        exit;
    } else {
        header("Location: ../admin/schedules.php?deleteStatus=fail");
        exit;
    }
?>