<?php

    require_once "../Personne.php";
    require_once "../Connection.php";

    session_start();
    $compte=$_SESSION["compte"];

    $newAddr=$_POST["newAddr"];

    $connection= new Connection();

    if($compte->getStatut()=="abonne"){
        $connection->initConnectionAbonne();
    }
    elseif($compte->getStatut()=="employe"){
        $connection->initConnectionEmploye();
    }


    $sql="UPDATE PERSONNE SET adresse= '".$newAddr."' WHERE id_personne='". $compte->getIdPersonne()."';";
    mysqli_query($connection->conn,$sql);

    $connection->closeConnection();

    echo "<script>window.top.postMessage('chgAddrP', '*')</script>";
    exit;
