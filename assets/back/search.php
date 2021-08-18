<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION ['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (prenom LIKE '%{$searchTerm}%' OR nom LIKE '%{$searchTerm}%')"); // where outgoing user id not displayed on user's search results. User can't send message to his/ her own account
    if(mysqli_num_rows($sql) > 0){
        include "data.php";
        // $output .= "Utilisateur trouvé";
    }else{
        $output .= "Aucun utilisateur trouvé.";
    }
    echo $output;