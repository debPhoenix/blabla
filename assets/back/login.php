<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);

    if(!empty($email) && !empty($mdp)){
        // check if email + password entered matched to database
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND mdp = '{$mdp}'");
        if(mysqli_num_rows($sql) > 0){ // if users credentials matched
            $row = mysqli_fetch_assoc($sql);
            // when a user logs in his status change to active
            $status = "En ligne";
            $sql2 = mysqli_query($conn, "UPDATE users SET status ='{$status}' WHERE unique_id = {$row['unique_id']}");
            if ($sql2){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            }
        }else{
            echo "Email ou mot de passe incorrecte.";
        }
    }else{
        echo "Merci de remplir tous les champs du formulaire!";
    }