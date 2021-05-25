<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mes emprunts</title>
    <link rel="stylesheet" type="text/css" href="../css/consulter_catalogue.css">
  </head>
  <body>
    <nav>
      <ul id="nav">
            <li><a href="index.php"> Accueil</a></li>
            <li><a href="a_propos.php">À propos de la médiathèque</a></li>
            <li><a href="consulter_catalogue.php">Consulter le catalogue</a></li>
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
    <h2>Mes Emprunts</h2>


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
    $query="CALL view_all_emprunt(".$_SESSION["id"].")";
    //prepare display tab
    echo '<h5 class="l">Liste des emprunts</h5><br /><br   /><br /><br   />';
    echo '<table id="produit" border="10" cellspacing="2" cellpadding="2">
      <tr>

          <td> <h3>ID</h3></td>
          <td> <h3><font face="Arial">Titre</font></h3> </td>
          <td> <h3><font face="Arial">Debut</font> </h3></td>
          <td> <h3><font face="Arial">Retour</font></h3> </td>
          <td><h3> <font face="Arial">Récupérer</font> </h3></td>
      </tr>';

    if ($result = $mysqli -> query($query)) {
        /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $id = $row["id_emprunt"];
          $debut= $row["dateDebut"];
          $retour = $row["dateRetour"];
          $recupere = $row["recupere"];
          $id_produit = $row["id_produit"];
          $id_personne = $row["id_personne"];
          $titre = $row["titre"];

          echo '<tr>
                 <td>'.$id.'</td>
                 <td>'.$titre.'</td>
                 <td>'.$debut.'</td>
                 <td>'.$retour.'</td>';
                 if($recupere == 0){
                  echo '<td> <a href ="reserver.php"</a>Definir comme récupéré</td>';
                 }
                 else{
                  echo "<td>Déja récupére</td>";
                 }
             echo '</tr>';
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';
    $mysqli -> close();
    ?>

  </body>
</html>
