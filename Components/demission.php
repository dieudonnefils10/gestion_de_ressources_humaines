<?php
session_start();
if(@$_SESSION['autoriser'] != "oui"){
    header('Location: ../');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php
$tete = "Demission";
require('../Components/header.php')
?>

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
                <a href="./deconnexion.php" class="logout">
                    <i class="bi bi-box-arrow-left"></i>Logout</a>
            </li>
        </ul>
    </div>
    <!-- End of sidebar-->
    <div class="content">
        <?php require('../Components/tooggle.php') ?>
        <div class="tittle">
            <h2 class="">Demission</h2>
        </div>
        <br>
        <main>
            <div class="row">
                <div class="col-lg-6">
                    <div class="dem">
                        <i class="bi bi-person-x pers"></i><br>
                        <h3 class="text-warning">Bienvenue dans la page de demission</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="demission">
                <form action="../Employer/demissions.php" method="post">
                <h2 class="text-info">Demission page</h2>
                <br>
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="Matricule" name="matricule" required>
                        <label for="">Matricule</label>
                    </div><br>
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="Motif de demission" name="motif" required>
                        <label for="">Motif de demission</label>
                    </div><br>
                    <button class="btn btn-danger" type="submit">Confirmer</button>
                </form>
            </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>