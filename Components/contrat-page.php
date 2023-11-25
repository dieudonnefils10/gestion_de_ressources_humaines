<?php
session_start();
if(@$_SESSION['autoriser'] != "oui"){
    header('Location: ../');
    exit();
} ?>
<!DOCTYPE html>
<html lang="fr">
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
                <a href="./deconnexion.php" class="logout">
                    <i class="bi bi-box-arrow-left"></i>Logout</a>
            </li>
        </ul>
    </div>
    <!-- End of sidebar-->
    <div class="content">
        <?php require('../Components/tooggle.php') ?>
        <?php require('../Contrat/contrat.php') ?>
        <div class="tittle">
            <h2 class="">Gestionnaire de contrats</h2>
        </div>
        <br>
        <ul class="insights">
            <li data-bs-toggle="modal" data-bs-target="#contrat" style="width: 180px; margin-left:60%;">
                <i class="bi bi-pencil"></i>
                <span class="info">
                    <p>Signer</p>
                </span>
            </li>
            <li data-bs-toggle="modal" data-bs-target="#renouvellement" style="width: 230px;">
                <i class="bi bi-pencil-square"></i>
                <span class="info">
                    <p>Renouveller</p>
                </span>
            </li>
        </ul>
        <main>
            <div class="test">
            <table class="table">
                <thead class="table">
                    <tr>
                        <th>Num_contrat</th>
                        <th>Matricule</th>
                        <th>Nom et prénoms</th>
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
                            <td><?= $emp['Nom'] ?> <?= $emp['Prenoms'] ?></td>
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

            <!-- Modal Ajout -->
            <div class="modal fade" id="contrat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-warning" id="exampleModalLabel">Signature de contrat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../Contrat/ajouter" method="POST">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingtext" placeholder="Matricule de l'agent" name="matricule" required>
                                    <label for="floatingInput">Matricule de l'agent</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingtext" placeholder="Type de contrat" name="contrat" required>
                                    <label for="floatingtext">Type de contrat</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingtext" placeholder="Salaire" name="salaire" min=0 required>
                                    <label for="floatingtext">Salaire</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingtext" placeholder="Date de debut" name="debut" required>
                                    <label for="floatingtext">Date de debut</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingtext" placeholder="Date de fin" name="fin" required>
                                    <label for="floatingtext">Date de fin</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-danger">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Renouvvellement de contrat  -->
    <div class="modal fade" id="renouvellement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">Renouvellemnt de contrat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../Contrat/modifier" method="POST">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingtext" placeholder="Matricule de l'agent" name="matriculeMod" required>
                            <label for="floatingInput">Matricule de l'agent</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingtext" placeholder="Type de contrat" name="contratMod" required>
                            <label for="floatingtext">Type de contrat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingtext" placeholder="Salaire" min=0 name="salaireMod" required>
                            <label for="floatingtext">Salaire</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingtext" placeholder="Date de debut" name="debutMod" required>
                            <label for="floatingtext">Date de debut</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingtext" placeholder="Date de fin" name="finMod" required>
                            <label for="floatingtext">Date de fin</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>