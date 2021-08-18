<?php
    session_start();
    // if user is already connected
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Blabla App</header>
            <form action="#" autocomplete="off">
            <div class="name-details">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="saisir votre email">
                </div>
                <div class="field input">
                    <label>Mot de passe</label>
                    <input type="password" name="mdp" placeholder="saisir votre mot de passe">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Connexion">
                </div>
            </div>
            </form>
            <div class="link">Nouveau? <a href="index.php">S'enregistrer</a></div>
        </section>

    </div>
    <!-- JS -->
    <script src="assets/js/show-hide-pass.js"></script>
    <script src="assets/js/login.js"></script>
</body>
</html>