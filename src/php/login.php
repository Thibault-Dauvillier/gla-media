<?php

    require_once "Connection.php";

    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $mdp=$_POST["mdp"];
    $statut=$_POST["statut"];

    $connection=new Connection();
    $nbRow=0;


    if($statut!="employe"){
        $statut="abonne";
        $connection->initConnectionAbonne();
    }
    else{
        $connection->initConnectionEmploye();
    }
    $sql=" select gla_database.connection('".$prenom."','".$nom."', '".$mdp."');";
    $result=mysqli_query($connection->conn,$sql);

    $row = mysqli_fetch_array($result);
/*
    if ($row[0]== 1) {

        $ligne = $res->fetch_array();
        echo $ligne;
        $personne = new Personne($res[0], $res[1], $res[2], $res[3], $res[4], $res[5], $res[6], $res[7], $res[8], $res[9], $res[10]);

    } else {
        echo "votre mail ou mots de passe ne son pas correct";
    }
*/
    $connection->closeConnection();