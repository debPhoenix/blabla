<?php
// same code for search user value and users list
    while($row = mysqli_fetch_assoc($sql)){
        $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
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