<?php

require_once "../Connection.php";

    session_start();
    $newTel=$_POST["newTel"];

    $connection= new Connection();

    if(strcmp($_SESSION["statut"],"abonne")){
        $connection->initConnectionAbonne();
    }
    elseif(strcmp($_SESSION["statut"],"employe")){
        $connection->initConnectionEmploye();
    }

    $sql="UPDATE PERSONNE SET numero= '".$newTel."' WHERE id_personne='". $_SESSION["id"]."';";
    mysqli_query($connection->conn,$sql);

    $connection->closeConnection();
    echo "<script>window.top.postMessage('chgNumTel', '*')</script>";
    exit;