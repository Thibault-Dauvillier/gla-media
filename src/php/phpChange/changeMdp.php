<?php
    require_once "../Connection.php";

    session_start();
    $compte=$_SESSION["compte"];

    $newMpd=$_POST["newMdp"];
    $oldMdp=$_POST["oldMdp"];

    $connection= new Connection();

    if(strcmp($_SESSION["statut"],"abonne")){
        $connection->initConnectionAbonne();
    }
    elseif(strcmp($_SESSION["statut"],"employe")){
        $connection->initConnectionEmploye();
    }

    $sql="call change_password(".$_SESSION["id"].",'".$oldMdp."','".$newMpd."');";
    $result=mysqli_query($connection->conn,$sql);

    if(!$result){
        echo $connection->conn->error;
        echo "<script>window.top.postMessage('chgMdpF', '*')</script>";
        exit;
    }

    $connection->closeConnection();
    echo "<script>window.top.postMessage('chgMdp', '*')</script>";
    exit;

