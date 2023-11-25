<?php
session_start();
if(@$_SESSION['autoriser'] != "oui"){
    header('Location: ../');
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<?php
$tete = "Demission";
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
            <li>
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
            <li class="active">
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
        <?php
        $conn = new PDO("mysql:host=localhost;dbname=stage", "root", "");
        $matricule = htmlspecialchars($_POST['hidden']);
        $nom = htmlspecialchars($_POST['nom']);
        $motif = htmlspecialchars($_POST['motif']);
        $prenoms = htmlspecialchars($_POST['prenoms']);
        $naissance = htmlspecialchars($_POST['naissance']);
        $phone = htmlspecialchars($_POST['phone']);
        $poste = htmlspecialchars($_POST['poste']);
        $demission = date("d/m/Y");
        $sql = "DELETE FROM employer WHERE Matricule = ? LIMIT 1";
        $req = $conn->prepare($sql);
        $delete = $req->execute(array($matricule));
        if ($delete) {
            $sql = "INSERT INTO archive VALUES(?, ?, ?, ?, ?, ?, ?,?)";
            $req = $conn->prepare($sql);
            $delete = $req->execute(array($matricule, $nom, $prenoms, $naissance, $phone, $poste, $demission, $motif));  ?>
              <div class="incomplet">
              <img src="../Image/possibility.png" alt="" class="img">
                  <h2>Demission confirmer</h2>
                  <i class="bi bi-check-circle-fill text-success"></i>
                  <br>
                  <button class="btn btn-dark"><a href="../Components/demission">Retourner sur l'accueil</a></button>
                </div>
        <?php } else {  ?>
            <div class="incomplet">
            <img src="../Image/possibility.png" alt="" class="img">
                <h2>Verifier le matricule</h2>
                <i class="bi bi-x-circle-fill text-success"></i>
                <br>
                <button class="btn btn-dark"><a href="../Components/demission">Retourner sur l'accueil</a></button>
              </div>
        <?php } ?>
    </div>
</body>

</html>