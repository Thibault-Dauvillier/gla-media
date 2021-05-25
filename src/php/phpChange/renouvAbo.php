<?php


require_once "../Connection.php";


if(isset($_POST["subscribe"])){

    echo "test";

    session_start();
    $connection = new Connection();

    if(strcmp($_SESSION["statut"],"abonne")){
        $connection->initConnectionAbonne();
    }
    elseif(strcmp($_SESSION["statut"],"employe")){
        $connection->initConnectionEmploye();
    }

    $sql = "CALL nouveau_abonnement(" . $_SESSION["id"] . ");";
    mysqli_query($connection->conn, $sql);
    $connection->closeConnection();
}
    echo "<script>window.top.postMessage('reAbo', '*')</script>";
exit;
