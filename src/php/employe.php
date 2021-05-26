<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employer</title>
    <link rel="stylesheet" type="text/css" href="../css/consulter_catalogue.css">
  </head>
  <body>
      <nav>
        <ul id="nav">
              <li><a href="index.php"> Accueil</a></li>
              <li><a href="a_propos.php">À propos de la médiathèque</a></li>
              <li><a href="consulter_catalogue.php">Consulter le catalogue</a></li>
              <li><a href="deconnection.php">Se deconnecter</a></li>
              <?php
              session_start();
              if(!isset($_SESSION["id"])){
                echo '<li><a href="../html/login.html">Se connecter</a></li>';
              }
              else{
                if((strcmp($_SESSION["statut"],"abonne") == 0)){
                  echo '<li><a href="../php/mes_emprunts.php">Mes emprunts</a></li>
                  <li><a href="../php/monCompte.php">Mon Compte</a></li>';
                }
                else{
                  echo '<li><a href="../php/employe.php">Employe</a></li>';
                }

              }
              ?>
        </ul>
      </nav>
    <h2>Page Employe</h2>


    <?php

    //testing connection with user abonne
    $servername = "localhost";
    $username = "root"; // root is default user with every privileges
    $password = ""; // root's default password is "", otherwise the password will be the username of the user
    $db = "gla_database";

    // Create connection
    $mysqli = new mysqli($servername,$username,$password,$db);

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }


    // Perform query
    $query="SELECT * FROM vue_emprunt";
    //prepare display tab
    echo '<h5 class="l">Liste des emprunts</h5><br/></br/></br/></br/>';
    echo '<table id="produit" border="10" cellspacing="2" cellpadding="2">
      <tr>

          <td> <h3>ID</h3></td>
          <td> <h3><font face="Arial">Titre</font></h3> </td>
          <td> <h3><font face="Arial">User</font> </h3></td>
          <td> <h3><font face="Arial">Debut</font> </h3></td>
          <td> <h3><font face="Arial">Retour</font></h3> </td>
          <td><h3> <font face="Arial">Prolonger</font></h3> </td>
          <td><h3> <font face="Arial">SUPPRIMER</font> </h3></td>
      </tr>';

    if ($result = $mysqli -> query($query)) {
        /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $id = $row["id_emprunt"];
          $debut= $row["dateDebut"];
          $retour = $row["dateRetour"];
          $prolongeable = $row["prolongeable"];
          $recupere = $row["recupere"];
          $id_produit = $row["id_produit"];
          $id_personne = $row["id_personne"];
          $mail = $row["mail"];
          $titre = $row["titre"];

          echo '<tr>
                 <td>'.$id.'</td>
                 <td>'.$titre.'</td>
                 <td>'.$mail.'</td>
                 <td>'.$debut.'</td>
                 <td>'.$retour.'</td>';
                 if($prolongeable == 1){
                  echo '<td> <a href ="employe.php?id_empP='.$id.'"</a>Prolonger</td>';
                 }
                 else{
                  echo "<td>Cet emprunt n'est pas prolongeable</td>";
                 }
                echo '<td> <a href ="employe.php?id_empS='.$id.'"</a>Supprimer</td>';
             echo '</tr>';
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';


    $query="SELECT * FROM vue_all_abonne";
    echo "<br /><br />";
    echo '<h5 class="l">Liste des abonnés</h5><br/></br/></br/></br/>';
    echo '<table id="produit" border="10" cellspacing="2" cellpadding="2">
      <tr>

          <td> <h3>ID</h3></td>
          <td> <h3><font face="Arial">Prenom</font></h3> </td>
          <td> <h3><font face="Arial">Nom</font> </h3></td>
          <td> <h3><font face="Arial">Mail</font> </h3></td>
          <td> <h3><font face="Arial">Verouillé</font></h3> </td>
          <td><h3> <font face="Arial">Fin Abonnement</font></h3> </td>
          <td><h3> <font face="Arial"></font> </h3></td>
      </tr>';

    if ($result = $mysqli -> query($query)) {
        /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $id = $row["id_personne"];
          $prenom= $row["prenom"];
          $nom = $row["nom"];
          $mail = $row["mail"];
          $locked = $row["locked"];
          $date = $row["dateFinAbo"];


          echo '<tr>
                 <td>'.$id.'</td>
                 <td>'.$prenom.'</td>
                 <td>'.$nom.'</td>
                 <td>'.$mail.'</td>';
                 if($locked == 1){
                  echo '<td>Oui</td>';
                 }
                 else{
                  echo "<td>Non</td>";
                 }
                 echo '
                 <td>'.$date.'</td>
                 <td> <a href ="employe.php?id_p='.$id.'"</a>Verouiller</td>';
             echo '</tr>';
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';


    $mysqli -> close();


    function prolonger($id_empP) {

      $servername = "localhost";
      $username = "root";
      $password = "";
      $db="gla_database";

      // Create connection
      $mysqli = new mysqli($servername, $username, $password,$db);
      $sql=" CALL etendre_emprunt(".$id_emP.")";
      $mysqli->query($sql);
      //close
    }


    function supprimer($id_empS) {

      $servername = "localhost";
      $username = "root";
      $password = "";
      $db="gla_database";

      // Create connection
      $mysqli = new mysqli($servername, $username, $password,$db);
      $sql=" DELETE FROM EMPRUNT WHERE id_emprunt =".$id_empS.";";
      $mysqli->query($sql);
      //close
    }


    function lock($id_p) {

      $servername = "localhost";
      $username = "root";
      $password = "";
      $db="gla_database";

      // Create connection
      $mysqli = new mysqli($servername, $username, $password,$db);
      $sql=" CALL lock_account(".$id_p.")"; //".$_SESSION["id"]."
      $mysqli->query($sql);
      //close
    }

    if (isset($_GET['id_empP'])) {
      creer($_GET['id_empP']);
    }
    if (isset($_GET['id_empS'])) {
      creer($_GET['id_empS']);
    }
    if (isset($_GET['id_p'])) {
      creer($_GET['id_p']);
    }
    ?>

  </body>
</html>
