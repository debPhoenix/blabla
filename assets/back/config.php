<?php
    $conn = mysqli_connect("localhost", "deb", "S2022", "blabla");
    if (!$conn){
        echo "ATTENTION! Base de données non connectée : " . mysqli_connect_error();
    }
