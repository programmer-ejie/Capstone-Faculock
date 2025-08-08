<?php
    include('../db_connection/conn.php');

    $id = $_GET['id'];
    $sql = "UPDATE `users` SET `status` = 'Approved' WHERE id = '$id'";
    $query = mysqli_query($conn,$sql);
    if($query){
        header("Location: ../admin/accounts.php");
        exit();
    }else{
        header("Location: ../admin/accounts.php");
        exit();
    }
?>