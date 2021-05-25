<?php


require_once "../Personne.php";
require_once "../Connection.php";


if(isset($_POST["subscribe"])){

    echo "test";

    session_start();
    $compte = $_SESSION["compte"];
    $connection = new Connection();

    if ($compte->getStatut() == "abonne") {
        $connection->initConnectionAbonne();
    } elseif ($compte->getStatut() == "employe") {
        $connection->initConnectionEmploye();
    }

    $sql = "CALL nouveau_abonnement(" . $compte->getIdPersonne() . ");";
    mysqli_query($connection->conn, $sql);
    $connection->closeConnection();
}
    echo "<script>window.top.postMessage('reAbo', '*')</script>";
exit;
