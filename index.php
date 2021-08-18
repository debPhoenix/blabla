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
        <section class="form signup">
            <header>Blabla App</header>
            <form action="#" enctype="multipart/form-data">
            <div class="name-details">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Prénom</label>
                    <input type="text" name="prenom" placeholder="saisir votre prénom" required>
                </div>
                <div class="field input">
                    <label>Nom</label>
                    <input type="text" name="nom" placeholder="saisir votre nom" required>
                </div>
                <div class="field input">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="saisir votre email" required>
                </div>
                <div class="field input">
                    <label>Mot de passe</label>
                    <input type="password" name="mdp" placeholder="saisir un mot de passe required">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field photo">
                    <label>Choisir un avatar:</label>
                    <input type="file" name="avatar">
                </div>
                <div class="field button">
                    <input type="submit" value="Continuer">
                </div>
            </div>
            </form>
            <div class="link">Déjà enregistré? <a href="login.php">Se connecter</a></div>
        </section>
    </div>
    <!-- JS -->
    <script src="assets/js/show-hide-pass.js"></script>
    <script src="assets/js/sign-up.js"></script>
</body>
</html>