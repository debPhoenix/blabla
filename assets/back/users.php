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
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '<a href="#">
                            <div class="content">
                                <img src="assets/back/avatar/' . $row['avatar'] . '" alt="">
                                <div class="details">
                                    <span>'. $row['prenom'] . " " . $row['nom'] .'</span>
                                    <p>test de la zone de message</p>
                                </div>
                            </div>
                            <div class="status-dot"><i class="fas fa-circle"></i></div>
                        </a>';
        }
    }
    echo $output;
?>