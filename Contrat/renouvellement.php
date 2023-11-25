<?php
$conn = new PDO("mysql:host=localhost;dbname=stage", "root", "");
$sql = "SELECT * FROM contrat WHERE MONTH(Fin) = MONTH(CURRENT_DATE()) AND YEAR(Fin) = YEAR(CURRENT_DATE())";
$req = $conn->prepare($sql);
$req->execute();
$affiche = $req->fetchAll();
