<?php
    session_start();
    include_once "config.php";
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);

    if(!empty($prenom) && !empty($nom) && !empty($email) && !empty($mdp)){
        // check user email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // if email is valid
            // check email already exist in database
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email ='{$email}'");
            // if email already exist
            if(mysqli_num_rows($sql) > 0){
                echo "$email existe déjà!";
            } else {
                // check user upload avatar file
                // $_FILES [] return an away with file name, file type, error, file size, tmp_name
                if(isset($_FILES['avatar'])){ // if uploaded file
                    $img_name = $_FILES['avatar']['name']; // get user uploaded img name
                    $tmp_name = $_FILES['avatar']['tmp_name']; // temporary img name to save file

                    // $img_type = $_FILES['avatar']['type']; // get user uploaded img type


                    // explode image + get last extension (png, jpg...)
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); // get extension

                    $extensions = ['png', 'jpeg', 'jpg'];
                     // if user image extension matched
                    if (in_array($img_ext, $extensions) === true){
                        $time = time(); // return current time, use it for rename user file
                        // move user uploaded file to avatar folder
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "avatar/".$new_img_name)){ // if user upload img move to avatar folder successfully
                            $status = "En ligne"; // when signup user status is online)
                            $random_id = rand(time(), 10000000); // create randow id for user
                            // insert all user data in database
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, prenom, nom, email, mdp, avatar, status)
                                                VALUES ({$random_id}, '{$prenom}', '{$nom}', '{$email}', '{$mdp}', '{$new_img_name}', '{$status}')");
                            if($sql2){
                            // if data inserted
                               $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                               if(mysqli_num_rows($sql3) > 0){
                                   $row = mysqli_fetch_assoc($sql3);
                                   $_SESSION['unique_id'] = $row['unique_id'];
                                   echo "success";
                               }
                            }else{
                                echo "Quelque chose n'a pas fonctionné.";
                            }
                        }
                    } else {
                        echo "Merci de sélectionner une image jpeg, jpg ou png!";
                    }
                }else{
                    echo "Merci de selectionner une image pour votre avatar!";
                }
            }
        } else {
            echo "$email n'est pas une adresse email valide!";
        }
    } else {
        echo "Merci de remplir tous les champs du formulaire!";
    }