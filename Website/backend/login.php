<?php
    include('../db_connection/conn.php');

    if($_SERVER['REQUEST_METHOD'] == "POST"){
            $faculty_gmail = $_POST['faculty_gmail'];
            $faculty_password = $_POST['faculty_password'];

            if($faculty_gmail == "admin@gmail.com" && $faculty_password == "admin"){
                $sqlLogs = "INSERT INTO `logs` (user_id,header_title,message) VALUES ('0','Admin Login','Admin has successfully logged into the system.')";
                mysqli_query($conn,$sqlLogs);
                header("Location: ../admin/dashboard.php");
            }else{
              $sql = "SELECT * FROM users WHERE status = 'Approved'";
              $query = mysqli_query($conn,$sql);
              $status = 0;

                if(mysqli_num_rows($query) == 0){
                    header("Location: ../auth/login.php?status=NoAccount");
                    exit();
                }else{
                    while($fetch = mysqli_fetch_assoc($query)){
                        if($faculty_gmail == $fetch['faculty_gmail']){
                            if($faculty_password == $fetch['faculty_password']){
                                $sqlLogs = "INSERT INTO `logs` (user_id,header_title,message) VALUES ('{$fetch['id']}','Faculty Login','Faculty member {$fetch['faculty_name']} has successfully logged into the system.')";
                                mysqli_query($conn,$sqlLogs);
                                header("Location: ../faculty/dashboard.php");
                                exit();
                            }else{
                                $status++;
                            }
                        }else{
                            $status++;
                        }
                      }
        
                      if($status > 0){
                        header("Location: ../auth/login.php?status=NoAccount");
                        exit();
                      }   
                }
          
              
            }       
    }
?>  