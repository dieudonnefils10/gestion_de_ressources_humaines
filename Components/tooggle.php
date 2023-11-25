        <!-- Navbar-->
        <nav>
            <?php
            $conn = new PDO("mysql:host=localhost;dbname=stage", "root", "");
            $sql = "SELECT COUNT(*)  AS total FROM contrat WHERE MONTH(Fin) = MONTH(CURRENT_DATE()) AND YEAR(Fin) = YEAR(CURRENT_DATE())";
            $req = $conn->prepare($sql);
            $req->execute();
            $affiche = $req->fetch();
            ?>
            <i class="bi bi-list"></i>
            <form action="#">
                <div class="titre">
                    <h3>Gestion de ressources humaines</h3>
                </div>
            </form>
            <a href="renouvellement" class="notif">
                <i class="bi bi-bell"></i>
                <span class="count"><?= $affiche['total'] ?></span>
            </a>
            <a href="#" class="profile">
                <img src="../Image/logo.jpg" alt="">
            </a>
        </nav>
        <!-- End of navbar-->