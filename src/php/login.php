<?php

    require_once "Connection.php";
    require_once  "Personne.php";

    $email=$_POST["email"];
    $mdp=$_POST["mdp"];
    $statut=$_POST["statut"];

    $connection=new Connection();
    $nbRow=0;

    if(isset($statut)){
        $connection->initConnectionEmploye();
    }
    else{
        $statut="abonne";
        $connection->initConnectionAbonne();
    }
    $sql=" CALL connection('".$email."','".$mdp."','".$statut."');";
    $result=mysqli_query($connection->conn,$sql);



    if(!$result){
        echo $connection->conn->error;
        header('Location: ../html/login.html');
        exit;
    }
    else{
        $row = mysqli_fetch_array($result);
        $personne = new Personne($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);

        session_start();
        $_SESSION["compte"]=$personne;

    }

    $connection->closeConnection();
    header('Location: monCompte.php');
    exit;