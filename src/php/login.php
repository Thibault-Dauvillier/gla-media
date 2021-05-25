<?php

    require_once "Connection.php";
    require_once  "Personne.php";


    $email=$_POST["email"];
    $mdp=$_POST["mdp"];
    $statut;
    if (isset($_POST['statut'])){
      $statut="employe";
    }
    else{
      $statut="abonne";
    }


    $connection=new Connection();
    $nbRow=0;

    if(strcmp($statut,"employe") == 0){
        $connection->initConnectionEmploye();
    }
    elseif(strcmp($statut,"abonne") == 0){
        $connection->initConnectionAbonne();
    }
    else{
      echo "statut ni abonne ni employe";
    }

    $sql=" CALL connection('".$email."','".$mdp."','".$statut."');";
    $result=mysqli_query($connection->conn,$sql);


    if(!$result) {
    echo $connection->conn->error;
    header('Location: ../html/login.html');
    }
    else {
        $row = mysqli_fetch_array($result);
        $personne = new Personne($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);

        session_start();
        $_SESSION["compte"]=$personne;


    //$connection->closeConnection();
    header('Location: consulter_catalogue.php');
  }

?>
