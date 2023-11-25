<?php
session_start();
if(@$_SESSION['autoriser'] != "oui"){
    header('Location: ../');
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<?php
$tete = "Employer";
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
      <li class="active">
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
    <?php
    $conn = new PDO("mysql:host=localhost;dbname=stage", "root", "");

    $sql = "UPDATE employer SET Nom = ? , Prenoms = ? ,Naissance =? , lieu = ? , cni = ? ,Telephone = ? , Poste = ? WHERE Matricule = ? LIMIT 1";
    $matricule = htmlspecialchars($_POST['matricule']);
    $nom = htmlspecialchars(strtoupper($_POST['nom']));
    $prenoms = htmlspecialchars(ucwords($_POST['prenoms']));
    $naissance = htmlspecialchars($_POST['naissance']);
    $lieu = htmlspecialchars(ucwords($_POST['lieu']));
    $cni = htmlspecialchars($_POST['cni']);
    $phone = htmlspecialchars($_POST['phone']);
    $poste = htmlspecialchars($_POST['poste']);
    $req = $conn->prepare($sql);
    $update = $req->execute(array($nom, $prenoms, $naissance,$lieu,$cni, $phone, $poste, $matricule));

    if ($update) { ?>
          <div class="incomplet">
          <img src="../Image/possibility.png" alt="" class="img">
              <h2>Modification avec success</h2>
              <i class="bi bi-check-circle-fill text-success"></i>
              <br>
              <button class="btn btn-dark"><a href="../Components/employers">Retourner sur l'accueil</a></button>
            </div>
    <?php } else { ?>
        <div class="incomplet">
          <img src="../Image/possibility.png" alt="" class="img">
              <h2>Echec de modification</h2>
              <i class="bi bi-check-circle-fill text-success"></i>
              <br>
              <button class="btn btn-dark"><a href="../Components/employers">Retourner sur l'accueil</a></button>
            </div>
    <?php } ?>
  </div>
</body>

</html>