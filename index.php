<?php
session_start();
$conn = new PDO('mysql:host=localhost;dbname=stage', 'root', '');
$erreur = "";
$error = "";

if (isset($_POST['submit'])) {

    $pseudo = htmlentities($_POST['mail']);
    $mdp = sha1($_POST['password']);

    if (!empty($pseudo)  &&  !empty($mdp)) {

        $req = "SELECT * FROM users WHERE pseudo = ? && mdp = ?";
        $sql = $conn->prepare($req);
        $sql->execute(array($pseudo, $mdp));

        if ($sql->rowCount() > 0) {

            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $sql->fetch()['id'];
            $_SESSION['autoriser'] = "oui";
            header('Location: ./Components/employers');
        } else {
            $erreur = "Email ou mot de passe incorrect";
        }
    } else {
        $erreur = "Completez les champs";
    }
}
?>
<?php

if (isset($_POST['inscrire'])) {
    $mail = htmlspecialchars($_POST['mail']);
    $pass = sha1($_POST['pass']);

    if (!empty($mail)  AND  !empty($pass)) {
        $req = "INSERT INTO users VALUES(?,?,?)";
        $sql = $conn->prepare($req);
        $insert = $sql->execute(array(NULL, $mail, $pass));

        if ($insert) {
            $error = "inscription reussit";
        } else {
            $error = "Echec d'inscription";
        }
    } else {
        $error = "Echec d'inscription";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="icon" href="./Image/barca.jpg" type="image/x-icon">
    <link rel="stylesheet" href="./Style/style.css">
    <link rel="stylesheet" href="./Style/style-index.css">
    <link rel="stylesheet" href="./Style/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./Style/bootstrap.min.css">
    <script src="./Js/bootstrap.min.js" defer></script>
    <style>
        body {
            background: #252954 !important;
        }

        .footer {
            margin-top: -1%;
        }
    </style>
</head>

<body>
    <div class="main ">
        <!-- Navbar  -->
        <div class="navbar" style="padding:20px 50px;">
            <a href="#" class="logo">CUFianarantsoa</a>
            <div class="nav-links">
                <span class="item selected">Home</span>
            </div>
            <div class="nav-buttons" id="navMenu">
                <button class="btn btn-outline-info">Connexion</button>
            </div>
        </div>
        <!-- End of Navbar  -->
        <div class="container">
            <div class="row">
                <div class="col premier">
                    <h2 class="text-white">Sign In</h2>
                    <div class="icons">
                        <i class="bi bi-google"></i>
                        <i class="bi bi-github"></i>
                        <i class="bi bi-linkedin"></i>
                        <i class="bi bi-facebook"></i>
                    </div>
                    <p class="or">Or use your email password</p>
                    <form action="" method="POST">
                        <input type="email" class="form-control connect" placeholder="Email" name="mail" required>
                        <br>
                        <input type="password" class="form-control connect" placeholder="Password" name="password" required>
                        <br>
                        <div class="erreur"><?= $erreur ?></div>
                        <br>
                        <button class="button btn btn-danger" type="submit" name="submit">Connexion</button>
                    </form>
                    <div class="formulaire">
                    </div>
                </div>
                <div class="col deuxieme">
                    <div class="texte">
                        <h1>Hello, Friend!</h1>
                        <p>Register with your personal details to use all of site features</p>
                        <div class="error">
                            <?= $error ?>
                        </div>
                        <br>
                        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#nouveau">S'inscrire</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid footer">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <i class="bi bi-activity text-light"></i>
                    <span class="mb-3 mb-md-0 text-light">&copy; 2023 CUF, Inc</span>
                </div>

                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-twitter"></i></a></li>
                    <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-instagram"></i></a></li>
                    <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-facebook"></i></a></li>
                </ul>
            </footer>
        </div>
    </div>
    <!-- Essai modal  -->

    <!-- Modal -->
    <div class="modal fade" id="nouveau" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="staticBackdropLabel">Inscription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="email" class="form-control" placeholder="Email" name="mail" required>
                        <br>
                        <input type="password" class="form-control" placeholder="Password" name="pass" required><br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="inscrire">S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>