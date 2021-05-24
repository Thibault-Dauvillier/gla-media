<?php

    require_once "Connection.php";

    $email=$_POST["email"];
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
    $sql=" CALL connection('".$email."','".$mdp."');";
    $result=mysqli_query($connection->conn,$sql);

    if($result->num_rows!=1){
        die("mail ou mots de passe incorrect");
    }
    else{
        $row = mysqli_fetch_array($result);
        $personne = new Personne($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10]);

        session_start();
        $_SESSION["compte"]=$personne;

    }

    $connection->closeConnection();