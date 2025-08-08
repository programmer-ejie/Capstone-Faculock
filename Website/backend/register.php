<?php
    include('../db_connection/conn.php');

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $faculty_name = $_POST['facultyName'];
        $faculty_gmail = $_POST['facultyGmail'];
        $faculty_password = $_POST['facultyPassoword'];

        $sql = "INSERT INTO `users` (faculty_name,faculty_gmail,faculty_password,faculty_age,faculty_department,faculty_position,faculty_school,status) VALUES ('$faculty_name','$faculty_gmail','$faculty_password',0,'No Data','No Data','No Data','Pending')";
        if(mysqli_query($conn,$sql)){
            // generate query to get the last inserted id
            $last_id = mysqli_insert_id($conn);

            $sqlUserNotif = "INSERT INTO `notifications` (user_id,header_title,message) VALUES ('$last_id','Pending for Approval','A new user registration is awaiting admin approval.')";
            mysqli_query($conn,$sqlUserNotif);
            header("Location: ../auth/register.php?modelStatus=true");
            exit();            
        }else{
            header("Location: ../auth/register.php?modelStatus=false");
            exit();    

        }
    }
?>