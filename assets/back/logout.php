<?php
    session_start();
    // if user is logged in he goes to this page otherwiser user got to login page
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        // if logout id is set
        if(isset($logout_id)){
            $status = "Hors ligne";
            $sql = mysqli_query($conn, "UPDATE users SET status ='{$status}' WHERE unique_id = {$logout_id}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../../login.php");
            }
        }else{
            header("location: ../../users.php");
        }
    }else{
        header("location: ../../login.php");
    }
