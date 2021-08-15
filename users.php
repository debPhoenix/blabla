<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        // set session when user login ou signup
        // if session not set redirect user to login page
        header("location: login.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
            <?php
            include_once "assets/back/config.php";
            // selecr all data of current logged in user using session
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
            }
            ?>
                <div class="content">
                    <img src="assets/back/avatar/<?php echo $row['avatar']?>" alt="">
                    <div class="details">
                        <span><?php echo $row['prenom'] . " " . $row['nom']?></span>
                        <p><?php echo $row['status']?></p>
                    </div>
                </div>
                <a href="#" class="logout">Se déconnecter</a>
            </header>
            <div class="search">
                <span class="text">Chercher un utilisateur avec qui discuter </span>
                <input type="text" placeholder="saisir le nom d'utilisateur">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">

            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="assets/js/users.js"></script>
</body>
</html>