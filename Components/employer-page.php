<?php
session_start();
if(@$_SESSION['autoriser'] != "oui"){
    header('Location: ../');
    exit();
} ?>
<!DOCTYPE html>
<html lang="fr">
<?php
$tete = "Employer";
require('header.php') ;

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
                <a href="./deconnexion.php" class="logout">
                    <i class="bi bi-box-arrow-left"></i>Logout</a>
            </li>
        </ul>
    </div>
    <!-- End of sidebar-->
    <div class="content">
        <?php require('tooggle.php') ?>
        <?php require('../Employer/employer.php') ?>

        <div class="row naviger">
            <div class="col-lg-6">
                <div class="tittle">
                    <h2 class="">Listes des agents</h2>
                </div>
            </div>
            <div class="col-lg-3">
           <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-person-plus"></i>Ajouter</button>>
            </div>
            <div class="col-lg-3">
                <div class="recherche">
                    <form action="recherche.php" method="post">
                    <input type="text" class="form-control search" placeholder="Recherche le matricule" name="recherche" required><button class="btn btn-danger reach"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <main>
            <div class="test">
                <div class="row">
                    <?php foreach ($affiche as $emp) : ?>
                        <div class="col-lg-4">
                            <div class="pad">
                                <p><i>Matricule : </i><?= $emp['Matricule'] ?></p>
                                <p><?= $emp['Nom'] ?> <?= $emp['Prenoms'] ?></p>
                                <p><i>Née le </i> <?= $emp['Naissance'] ?> <i>à </i> <?= $emp['lieu'] ?></p>
                                <p><i>CNI :</i> <?= $emp['cni'] ?></p>
                                <p><i>Telephone : </i><?= $emp['Telephone'] ?></p>
                                <p><i>Poste :</i> <?= $emp['Poste'] ?></p>
                                <button class="btn btn-primary modifier" data-bs-toggle="modal" data-bs-target="#modifier" onclick="document.getElementById('matricule').value=<?= $emp['Matricule'] ?>;document.getElementById('noms').value='<?= $emp['Nom'] ?>';document.getElementById('prenoms').value='<?= $emp['Prenoms'] ?>';document.getElementById('naissance').value='<?= $emp['Naissance'] ?>';document.getElementById('lieu').value='<?= $emp['lieu'] ?>';document.getElementById('cni').value='<?= $emp['cni'] ?>';document.getElementById('phone').value='<?= $emp['Telephone'] ?>';document.getElementById('poste').value='<?= $emp['Poste'] ?>';"><a href="#" class="text-white">Modifier</a></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
        <!-- Modal Ajouter -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="exampleModalLabel">Nouveau agent</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="../Employer/ajouter" method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control nom" id="nom" placeholder="Nom" name="nom" required>
                                        <label for="floatingtext">Nom</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingtext" placeholder="Prenoms" name="prenoms" required>
                                        <label for="floatingtext">Prenoms</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingtext" placeholder="Date de naissance" name="naissance" required>
                                        <label for="floatingtext">Date de naissance</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingtext" placeholder="Lieu de naissance" name="lieu" required>
                                        <label for="floatingtext">Lieu de naissance</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" min=0 class="form-control" id="floatingtext" placeholder="CNI" name="cni" required>
                                <label for="floatingtext">CNI</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" min=0 class="form-control" id="floatingtext" placeholder="Telephone" name="phone" required>
                                <label for="floatingtext">Telephone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingtext" placeholder="Poste" name="poste" required>
                                <label for="floatingtext">Poste</label>
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
        <!-- Modal modifier -->
        <div class="modal fade" id="modifier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="exampleModalLabel">Modifier un agent</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="../Employer/modifier" method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control nom" id="matricule" placeholder="Nom" name="matricule" required hidden>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="noms" placeholder="Nom" name="nom" required>
                                        <label for="floatingtext">Nom</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="prenoms" placeholder="Prenoms" name="prenoms" required>
                                        <label for="floatingtext">Prenoms</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="naissance" placeholder="Date de naissance" name="naissance" required>
                                        <label for="floatingtext">Date de naissance</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lieu" placeholder="Lieu de naissance" name="lieu" required>
                                        <label for="floatingtext">Lieu de naissance</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" min=0 class="form-control" id="cni" placeholder="CNI" name="cni" required>
                                <label for="floatingtext">CNI</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" min=0 class="form-control" id="phone" placeholder="Telephone" name="phone" required>
                                <label for="floatingtext">Telephone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="poste" placeholder="Poste" name="poste" required>
                                <label for="floatingtext">Poste</label>
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
    </div>
</body>

</html>