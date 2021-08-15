<?php
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE prenom LIKE '%{$searchTerm}%' OR nom LIKE '%{$searchTerm}%'");
    if(mysqli_num_rows($sql) > 0){
        include "data.php";
        // $output .= "Utilisateur trouvé";
    }else{
        $output .= "Aucun utilisateur trouvé.";
    }
    echo $output;