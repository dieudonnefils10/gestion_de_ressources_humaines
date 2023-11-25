<?php
session_start();
if (@$_SESSION['autoriser'] != "oui") {
    header('Location: ../');
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<?php
$tete = "Contrat";
require('../Components/header.php') ?>

<body>
    <!-- sidebar -->
    <div class="sidebar ">
        <a href="#" class="logo">
            <i class="bi bi-laptop"></i>
            <div class="logo-name">
                <span>R</span>H
            </div>
        </a>
        <ul class="side-menu">
            <li>
                <a href="../Components/employers">
                    <i class="bi bi-people"></i>Agents</a>
            </li>
            <li class="active">
                <a href="../Components/contrat">
                    <i class="bi bi-pencil"></i>Contrats</a>
            </li>
            <li>
                <a href="../Components/conger">
                    <i class="bi bi-disc"></i>Conger</a>
            </li>
            <li>
                <a href="../Components/renouvellement">
                    <i class="bi bi-pencil-square"></i>Renouvellement</a>
            </li>
            <li>
                <a href="../Components/archive">
                    <i class="bi bi-folder-x"></i>Archive</a>
            </li>
            <li>
                <a href="../Components/demission">
                    <i class="bi bi-person-x"></i>Demission</a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="../Components/deconnexion.php" class="logout">
                    <i class="bi bi-box-arrow-left"></i>Logout</a>
            </li>
        </ul>
    </div>
    <!-- End of sidebar-->
    <div class="content">
        <?php require('../Components/tooggle.php')  ?>
        <p></p>
        <?php
        $conn = new PDO("mysql:host=localhost;dbname=stage", "root", "");
        $matricule = htmlspecialchars($_POST['matricule']);
        $contrat = htmlspecialchars($_POST['contrat']);
        $salaire = htmlspecialchars($_POST['salaire']);
        $debut = htmlspecialchars($_POST['debut']);
        $fin = htmlspecialchars($_POST['fin']);

        $motif = "vide";
        $prise = 0;
        $reste = 60;

        $requete = "SELECT * FROM employer WHERE Matricule = ?";
        $reqs = $conn->prepare($requete);
        $resul = $reqs->execute(array($matricule));
        $affi = $reqs->fetch();
        if ($reqs->rowCount() > 0) {
            $test = "SELECT * FROM contrat WHERE Matricule = ?";
            $teste = $conn->prepare($test);
            $teste->execute(array($matricule));
            $essai = $teste->fetch();

            if ($teste->rowCount() > 0) { ?>
                <div class="incomplet">
                    <img src="../Image/possibility.png" alt="" class="img">
                    <h2>Verifier le matricule</h2>
                    <i class="bi bi-x-circle-fill text-success"></i>
                    <br>
                    <button class="btn btn-dark"><a href="../Components/contrat">Retourner sur l'accueil</a></button>
                </div>
                <?php } else {
                if ($affi['Matricule'] == $matricule) {
                    $nom = $affi['Nom'];
                    $prenoms = $affi['Prenoms'];
                    $cni = $affi['cni'];
                    if (!empty($matricule) && !empty($contrat) && !empty($salaire) && !empty($debut) && !empty($fin)) {
                        $sql = "INSERT INTO contrat VALUES(?, ? , ? , ? , ? , ?, ? , ? , ?  )";
                        $req = $conn->prepare($sql);
                        $req->execute(array(NULL, $matricule, $nom, $prenoms, $cni, $contrat, $salaire, $debut, $fin));
                        $requete = "INSERT INTO conger VALUES(? , ? , ? , ? , ? , ?)";
                        $query = $conn->prepare($requete);
                        $query->execute(array($matricule, $nom, $prenoms, $motif, $prise, $reste));  ?>
                        <div class="incomplet">
                            <img src="../Image/possibility.png" alt="" class="img">
                            <h2>Enregistrer avec success</h2>
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <br>
                            <button class="btn btn-dark"><a href="../Components/contrat">Retourner sur l'accueil</a></button>
                        </div>
                    <?php } else {  ?>
                        <div class="incomplet">
                            <img src="../Image/possibility.png" alt="" class="img">
                            <h2>Information incomplet</h2>
                            <i class="bi bi-x-circle-fill text-success"></i>
                            <br>
                            <button class="btn btn-dark"><a href="../Components/contrat">Retourner sur l'accueil</a></button>
                        </div>
                    <?php
                    }
                } else { ?>
                    <div class="incomplet">
                        <img src="../Image/possibility.png" alt="" class="img">
                        <h2>Verifier le matricule</h2>
                        <i class="bi bi-x-circle-fill text-success"></i>
                        <br>
                        <button class="btn btn-dark"><a href="../Components/contrat">Retourner sur l'accueil</a></button>
                    </div>
            <?php
                }
            }
        } else { ?>
            <div class="incomplet">
                <img src="../Image/possibility.png" alt="" class="img">
                <h2>Verifier le matricule</h2>
                <i class="bi bi-x-circle-fill text-success"></i>
                <br>
                <button class="btn btn-dark"><a href="../Components/contrat">Retourner sur l'accueil</a></button>
            </div>
        <?php   } ?>
    </div>
</body>

</html>