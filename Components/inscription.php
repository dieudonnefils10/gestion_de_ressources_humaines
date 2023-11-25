<?php
session_start();
    $conn = new PDO('mysql:host=localhost;dbname=stage','root','');

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = sha1($_POST['mdp']);

    if(!empty($pseudo)  &&  !empty($mdp)){
        $req = "INSERT INTO users VALUES(?,?,?)";
        $sql = $conn->prepare($req);
        $insert = $sql->execute(array(NULL,$pseudo,$mdp));

        if($insert){
            echo "SUCCES";
        }else{
            echo "ERREUR";
        } 
   } else{
        echo "Information incomplet";
    }
    ?>