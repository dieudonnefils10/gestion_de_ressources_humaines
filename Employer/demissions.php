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

        $sql = "SELECT * FROM employer WHERE Matricule = ?";
        $matricule = htmlspecialchars($_POST['matricule']);
        $motif = htmlspecialchars($_POST['motif']);
        $req = $conn->prepare($sql);
        $update = $req->execute(array($matricule));
        $afficher = $req->fetch();
        if($afficher != NULL){
        $nom = $afficher['Nom'];
        $prenoms = $afficher['Prenoms'];
        $naissance = $afficher['Naissance'];
        $phone = $afficher['Telephone'];
        $poste = $afficher['Poste'];
    }
        ?>
        <form action="confirmer" method="post">
            <input type="hidden" name="hidden" value="<?= $matricule ?>">
            <input type="hidden" name="nom" value="<?= $nom ?>">
            <input type="hidden" name="motif" value="<?= $motif ?>">
            <input type="hidden" name="prenoms" value="<?= $prenoms ?>">
            <input type="hidden" name="naissance" value="<?= $naissance ?>">
            <input type="hidden" name="phone" value="<?= $phone ?>">
            <input type="hidden" name="poste" value="<?= $poste ?>">
            <?php
            if ($afficher != NULL) {  ?>
            <div class="incomplet">
      </form>
      <img src="../Image/possibility.png" alt="" class="img">
      <h2 class="text-warning nom"><?=$afficher["Nom"]?>   <?=$afficher["Prenoms"]?></h2><br><h3>vient de demissionner</h3><button type="button" class="btn btn-secondary non" style="margin-left: 30%;"><a href="../Components/demission">Annuler</a></button><button type="submit" class="btn btn-success oui"  style="margin-left: 5%;">Confirmer</button>
      </div>';
          <?php   } else {  ?>
                <div class="incomplet">
                <img src="../Image/possibility.png" alt="" class="img">
             <h2>Verifier le matricule</h2>
             <i class="bi bi-x-circle-fill text-warning"></i><br>
             <button class="btn btn-dark" style="margin-left:40%"><a href="../Components/demission">Verifier</a></button>
      </div>
         <?php  } ?>
    </div>
</body>

</html>