<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        // select all chat matched to incoming_msg_id and outgoing_msg_id
        $sql = "SELECT * FROM messages
                LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0 ){
            while($row = mysqli_fetch_assoc($query)){
                // if equal, it is a msg sender
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= ' <div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                // else it is a msg receiver
                }else{
                    $output .= ' <div class="chat incoming">
                                    <img src="assets/back/avatar/'.$row['avatar'].'" alt="">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div> ';
                }
            }
            echo $output;
        }
    }else{
        header("../../login.php");
    }
