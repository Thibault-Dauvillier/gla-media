<?php

    require_once "Connection.php";

    $email=$_POST["email"];
    $mdp=$_POST["mdp"];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $tel=$_POST["tel"];
    $adresse=$_POST["adresse"];
    $dnaissance=$_POST["dnaissance"];
    $statut=$_POST["statut"];

    $connection= new Connection();

    if($statut!="employe"){
        $statut="abonne";
        $connection->initConnectionAbonne();

    }
    else{
        $connection->initConnectionEmploye();
    }


    $sqlt="INSERT INTO PERSONNE(prenom,nom,numero,adresse,mail,birthdate,password) VALUES('".$prenom."','".$nom."','".$tel."','".$adresse."','".$email."','".$dnaissance."','".$mdp."')";
    $sql="call inscription('".$prenom."','".$nom."',".$tel.",'".$adresse."','".$email."','".$dnaissance."','".$mdp."','".$statut."');";
    echo $sql."\n";
    if ($connection->conn->query($sql)) {
        printf("Record inserted successfully.<br />");
    }

    $connection->closeConnection();

    header('Location: ../html/index.html');

    ?>
