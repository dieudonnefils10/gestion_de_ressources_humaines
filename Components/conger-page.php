<?php
session_start();
if(@$_SESSION['autoriser'] != "oui"){
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
                <a href="./deconnexion.php" class="logout">
                    <i class="bi bi-box-arrow-left"></i>Logout</a>
            </li>
        </ul>
    </div>
    <!-- End of sidebar-->
    <div class="content">
        <?php require('../Components/tooggle.php') ?>
        <?php require('../Conger/conger.php') ?>
        <div class="tittle">
            <h2 class="">Gestionnaire de conger</h2>
        </div>
        <!-- Insights-->
        <ul class="insights">
            <li data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-cash"></i>
                <span class="info">
                    <p>60 jours</p>
                    <p>Annuelle</p>
                </span>
            </li>
            <li data-bs-toggle="modal" data-bs-target="#maternite">
                <i class="bi bi-person-heart"></i>
                <span class="info">
                    <p>90 jours</p>
                    <p>Maternité</p>
                </span>
            </li>
            <li data-bs-toggle="modal" data-bs-target="#paternite">
                <i class="bi bi-person"></i>
                <span class="info">
                    <p>40 jours</p>
                    <p>Paternité</p>
                </span>
            </li>
            <li data-bs-toggle="modal" data-bs-target="#maladie">
                <i class="bi bi-thermometer-high"></i>
                <span class="info">
                    <p>Repos</p>
                    <p>Maladie</p>
                </span>
            </li>
        </ul>
        <!-- End of isights-->
        <main>
            <div class="test">
                <table class="table">
                    <thead class="table">
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénoms</th>
                            <th>Motif</th>
                            <th>Jours prise</th>
                            <th>Jours restant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($affiche as $emp) : ?>
                            <tr>
                                <td><?= $emp['Matricule'] ?></td>
                                <td><?= $emp['Nom'] ?></td>
                                <td><?= $emp['Prenoms'] ?></td>
                                <td><?= $emp['Motif'] ?></td>
                                <td><?= $emp['Prise'] ?></td>
                                <td><?= $emp['Restant'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal  Sans solde-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-warning" id="exampleModalLabel">Conger sans solde</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../Conger/normal" method="POST">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingtext" placeholder="Matricule du nouvelle employer" name="matricule" required>
                                    <label for="floatingInput">Matricule de l'employer</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingtext" placeholder="Jours à prendre" name="prise" min=1 max=30 required>
                                    <label for="floatingtext">Jours à prendre</label>
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
            <!-- Modal  Maternité-->
            <div class="modal fade" id="maternite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-warning" id="exampleModalLabel">Conger de maternité</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../Conger/maternite" method="POST">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingtext" placeholder="Matricule du nouvelle employer" name="matricule" required>
                                    <label for="floatingInput">Matricule de l'employer</label>
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
            <!-- Modal  Paternité-->
            <div class="modal fade" id="paternite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-warning" id="exampleModalLabel">Conger de paternité</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../Conger/paternite" method="POST">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingtext" placeholder="Matricule du nouvelle employer" name="matricule" required>
                                    <label for="floatingInput">Matricule de l'employer</label>
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
            <!-- Modal  Maladie-->
            <div class="modal fade" id="maladie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-warning" id="exampleModalLabel">Conger de maladie</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../Conger/maladie" method="POST">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingtext" placeholder="Matricule du nouvelle employer" name="matricule" required>
                                    <label for="floatingInput">Matricule de l'employer</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingtext" placeholder="Jours à prendre" name="prise" min=1 required>
                                    <label for="floatingtext">Jours à prendre</label>
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
</body>

</html>