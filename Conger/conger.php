<?php
$conn = new PDO("mysql:host=localhost;dbname=stage", "root", "");
$sql = "SELECT * FROM conger";
$req = $conn->prepare($sql);
$req->execute();
$affiche = $req->fetchAll();

if (date('m') == 1 && date('d') == 1) {
    $sql = "UPDATE conger SET Prise = 0 , Restant = 30";
    $req = $conn->prepare($sql);
    $req->execute();
}
