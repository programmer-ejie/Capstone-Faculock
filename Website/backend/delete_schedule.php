<?php
    include('../db_connection/conn.php');
    session_start();


    $id = $_GET['id'];
    $sql = "DELETE FROM schedules WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
       $filter_department = isset($_GET['filter_department']) ? $_GET['filter_department'] : '';
        $sort_date = isset($_GET['sort_date']) ? $_GET['sort_date'] : '';
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $query = "deleteStatus=success&filter_department=$filter_department&sort_date=$sort_date&page=$page";
        header("Location: ../admin/schedules.php?$query");
        exit;
    } else {
       $filter_department = isset($_GET['filter_department']) ? $_GET['filter_department'] : '';
        $sort_date = isset($_GET['sort_date']) ? $_GET['sort_date'] : '';
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $query = "deleteStatus=fail&filter_department=$filter_department&sort_date=$sort_date&page=$page";
        header("Location: ../admin/schedules.php?$query");
        exit;
    }
?>