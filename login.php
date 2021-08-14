<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ICON -->
    <link rel="icon" type="image/png" sizes="32x32" href="#">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="apple-touch-icon" href="#">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- METATAGS -->
    <title>Connexion • Blabla App</title>
    <meta name="title" content="Blabla App">
    <meta name="description" content="Realtime chat">
    <meta name="author" content="Déb Phoenix">
    <meta name="language" content="fr">
    <meta name="keywords" content="chat, tchat, discussion, discuter, échanger">
    <meta name="robots" content="index,follow">
    <meta name="copyright" content="Déb Phoenix">
</head>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Blabla App</header>
            <form action="#" autocomplete="off">
            <div class="name-details">
                <div class="error-txt">
                    Ceci est un message d'erreur
                </div>
                <div class="field input">
                    <label>Email</label>
                    <input type="email" placeholder="saisir votre email">
                </div>
                <div class="field input">
                    <label>Mot de passe</label>
                    <input type="password" placeholder="saisir votre mot de passe">
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
</body>
</html>