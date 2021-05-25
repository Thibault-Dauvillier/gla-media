<?php

    require_once "../Personne.php";
    require_once "../Connection.php";

    session_start();
    $compte=$_SESSION["compte"];

    $newMpd=$_POST["newMdp"];
    $oldMdp=$_POST["oldMdp"];

    $connection= new Connection();

    if($compte->getStatut()=="abonne"){
        $connection->initConnectionAbonne();
    }
    elseif($compte->getStatut()=="employe"){
        $connection->initConnectionEmploye();
    }

    $sql="call change_password(".$compte->getIdPersonne().",'".$oldMdp."','".$newMpd."');";
    mysqli_query($connection->conn, $sql);
    $connection->closeConnection();

    $result=mysqli_query($connection->conn,$sql);

    if(!$result){
        echo $connection->conn->error;
        exit;
    }

    $connection->closeConnection();
    echo "<script>window.top.postMessage('chgMdp', '*')</script>";
    exit;

