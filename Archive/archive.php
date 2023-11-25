<?php
$conn = new PDO("mysql:host=localhost;dbname=stage", "root", "");
$sql = "SELECT * FROM archive";
$req = $conn->prepare($sql);
$req->execute();
$affiche = $req->fetchAll();
 