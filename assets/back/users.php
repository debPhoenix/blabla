<?php
    session_start();
    include_once "config.php";
    $sql = mysqli_query($conn, "SELECT * FROM users");
    $output = "";
    // if only one row in database
    if(mysqli_num_rows($sql) === 1){
        $output .= "Aucun utilisateur connecté.";
    // else show all users
    }elseif(mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    echo $output;
?>