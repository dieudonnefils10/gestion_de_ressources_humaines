<?php
session_start();
if(@$_SESSION['autoriser'] != "oui"){
    header('Location: ../');
    exit();
} ?>
<!DOCTYPE html>
<html lang="fr">
<?php
$tete = "Archive";
require('header.php') ?>

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
            <li class="active">
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
        <?php require('tooggle.php') ?>
        <?php require('../Archive/archive.php') ?>
        <div class="tittle">
            <h2 class="">Archive du commune</h2>
        </div>
        <br>
        <main>
            <div class="test">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table">
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Date de naissance</th>
                            <th>Telephone</th>
                            <th>Poste</th>
                            <th>Date de demmision</th>
                            <th>Motif</th>
                    </thead>
                    <tbody>
                        <?php foreach ($affiche as $emp) : ?>
                            <tr>
                                <td><?= $emp['Matricule'] ?></td>
                                <td><?= $emp['Nom'] ?></td>
                                <td><?= $emp['Prenoms'] ?></td>
                                <td><?= $emp['Naissance'] ?></td>
                                <td><?= $emp['Telephone'] ?></td>
                                <td><?= $emp['Poste'] ?></td>
                                <td><?= $emp['Demission'] ?></td>
                                <td><?= $emp['Motif'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>