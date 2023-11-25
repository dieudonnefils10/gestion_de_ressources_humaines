<?php
session_start();
if (@$_SESSION['autoriser'] != "oui") {
  header('Location: ../');
  exit();
} ?>
<!DOCTYPE html>
<html lang="fr">

<?php
$tete = "Conger";
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
      <li class="active">
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
    $matricule = htmlspecialchars($_POST['matricule']);
    $motif = "Paternité";

    $select = "SELECT * FROM conger WHERE Matricule = ?";
    $query = $conn->prepare($select);
    $requete = $query->execute(array($matricule));
    $resultat = $query->fetch();

    if ($query->rowCount() > 0) {
      $prise = $resultat['Prise'] + 40;
      $sql = "UPDATE conger SET Motif = ? , Prise = ? WHERE Matricule = ? LIMIT 1";
      $req = $conn->prepare($sql);
      $update = $req->execute(array($motif, $prise, $matricule));

      if ($update) { ?>
        <div class="incomplet">
          <img src="../Image/possibility.png" alt="" class="img">
          <h2>Conger prise avec success</h2>
          <i class="bi bi-check-circle-fill text-success"></i>
          <br>
          <button class="btn btn-dark"><a href="../Components/conger">Retourner sur l'accueil</a></button>
        </div>
      <?php } else { ?>
        <div class="incomplet">
          <img src="../Image/possibility.png" alt="" class="img">
          <h2>Echec de prise de conger</h2>
          <i class="bi bi-x-circle-fill text-success"></i>
          <br>
          <button class="btn btn-dark"><a href="../Components/conger">Retourner sur l'accueil</a></button>
        </div>
      <?php } } else { ?>
      <div class="incomplet">
        <img src="../Image/possibility.png" alt="" class="img">
        <h2>Echec de prise de conger</h2>
        <i class="bi bi-x-circle-fill text-success"></i>
        <br>
        <button class="btn btn-dark"><a href="../Components/conger">Retourner sur l'accueil</a></button>
      </div>
    <?php } ?>
  </div>
</body>

</html>