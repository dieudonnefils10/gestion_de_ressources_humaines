<?php
session_start();
if(@$_SESSION['autoriser'] != "oui"){
    header('Location: ../');
    exit();
} ?>
<!DOCTYPE html>
<html lang="fr">
<?php
$tete = "Renouvellement de contrat";
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
            <li class="active">
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
                <a href="./deconnexion.php" class="logout">
                    <i class="bi bi-box-arrow-left"></i>Logout</a>
            </li>
        </ul>
    </div>
    <!-- End of sidebar-->
    <div class="content">
        <?php require('../Components/tooggle.php') ?>
        <?php require('../Contrat/renouvellement.php') ?>
        <div class="tittle">
            <h2 class="">Contrat à renouveller</h2>
        </div>
        <br>
        <main>
            <div class="test">
            <table class="table">
                <thead class="table">
                    <tr>
                        <th>Num_contrat</th>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>CNI</th>
                        <th>Contrat</th>
                        <th>Salaire</th>
                        <th>Date de debut</th>
                        <th>Date de fin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($affiche as $emp) : ?>
                        <tr>
                            <td><?= $emp['Num_contrat'] ?></td>
                            <td><?= $emp['Matricule'] ?></td>
                            <td><?= $emp['Nom'] ?></td>
                            <td><?= $emp['Prenoms'] ?></td>
                            <td><?= $emp['CNI'] ?></td>
                            <td><?= $emp['Type'] ?></td>
                            <td><?= $emp['Salaire'] ?></td>
                            <td><?= $emp['Debut'] ?></td>
                            <td><?= $emp['Fin'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </main>
    </div>
</body>

</html>