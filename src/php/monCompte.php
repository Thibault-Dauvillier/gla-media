<?php

require_once "Connection.php";

    session_start();
    $sql="SELECT numero , adresse , birthdate , dateFinAbo FROM PERSONNE WHERE id_personne='".$_SESSION["id"]."';";

    $connection=new Connection();

    if($_SESSION["statut"]=="abonne"){

        $connection->initConnectionAbonne();

    }elseif($_SESSION["statut"]->getStatut()=="employe"){

        $connection->initConnectionEmploye();

    }

    $result=$connection->conn->query($sql);
    $result=$result->fetch_row();

    echo "
            <!DOCTYPE html>
            <html lang='fr'>
            <head>
                <meta charset='UTF-8'>
                <title>MonCompte</title>
                <link rel='stylesheet' type='text/css' href='../css/monCompte.css'>
            </head>
            <body>
                <h1>Mon compte</h1> 
                <div class='center'>
                    <img src='../img/avatar.png' class='avatar'>
                    <h3>Email: ".$_SESSION["email"]." </h3>
                    <h3>Prenom: ".$_SESSION["prenom"]."</h3>
                    <h3>Nom: ".$_SESSION["nom"]."</h3>
                    <h3>Date de naissance: ".$result[2]."</h3>
                    <h3>Adresse Postale: ".$result[1]."    <button class='btn' onclick='chgAddrP()'>Modifier son addresse postale</button></h3>
                    <iframe hidden='true' id='chgAddrP' src='../html/htmlChange/changeAddrPostale.html'></iframe>
                    <h3>Telephone: ".$result[0]."     <button class='btn' onclick='chgTel()'>Modifier son numero de telephone</button></h3>
                    <iframe hidden='true' id='chgTel' src='../html/htmlChange/changeNumTel.html'></iframe>
                    <h3>Date de fin d'abonnement: ".$result[3]."     <button class='btn' onclick='reAbo()'>Ce Re-abonner</button></h3>
                     <iframe hidden='true' id='reAbo' src='../html/htmlChange/renouvAbo.html'></iframe>
                    </br></br>
                    <button class='btn' onclick='chMdp()'>Modifier son mot de passe</button>
                    <iframe class='mdpFrame' hidden='true' id='chgMdp' src='../html/htmlChange/changeMdp.html'></iframe>
                </div>
                <script src='../js/showHiddeIframe.js'></script>
            </body>
            </html
";

    $connection->closeConnection();