<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connection</title>
  </head>
  <body>
    Hello World : connecting to gla_database on start.<br>
    --------------------------------------------------


    <?php

    //testing connection with user abonne
    $servername = "localhost";
    $username = "abonne"; // root is default user with every privileges
    $password = "abonne"; // root's default password is "", otherwise the password will be the username of the user
    $db = "gla_database";

    // Create connection
    $mysqli = new mysqli($servername,$username,$password,$db);

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    echo "<br>Connected successfully as user : ".$username;

    // Perform query
    $query="SELECT * FROM `vue_all_abonne`";
    echo "<br>Performing vue_all_abonne :";

    //prepare display tab
    echo '<table border="0" cellspacing="2" cellpadding="2">
      <tr>
          <td> <font face="Arial">ID</font> </td>
          <td> <font face="Arial">PRENOM</font> </td>
          <td> <font face="Arial">NOM</font> </td>
          <td> <font face="Arial">NUMERO</font> </td>
          <td> <font face="Arial">ADRESSE</font> </td>
          <td> <font face="Arial">EMAIL</font> </td>
          <td> <font face="Arial">DATE DE NAISSANCE</font> </td>
          <td> <font face="Arial">VEROUILLAGE</font> </td>
          <td> <font face="Arial">FIN ABONNEMENT</font> </td>
      </tr>';

    if ($result = $mysqli -> query($query)) {
        /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $id = $row["id_personne"];
          $prenom = $row["prenom"];
          $nom = $row["nom"];
          $num = $row["numero"];
          $adresse = $row["adresse"];
          $mail = $row["mail"];
          $birthdate = $row["birthdate"];
          $locked = $row["locked"];
          $dateAbo = $row["dateFinAbo"];

          echo '<tr>
                 <td>'.$id.'</td>
                 <td>'.$prenom.'</td>
                 <td>'.$nom.'</td>
                 <td>'.$num.'</td>
                 <td>'.$adresse.'</td>
                 <td>'.$mail.'</td>
                 <td>'.$birthdate.'</td>
                 <td>'.$locked.'</td>
                 <td>'.$dateAbo.'</td>
             </tr>';
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';


    $mysqli -> close();
    echo "<br>Closed conection as user : ".$username;
    echo "<br>--------------------------------------------------";























    //testing connection with user employe
    $username = "employe"; // root is default user with every privileges
    $password = "employe"; // root's default password is "", otherwise the password will be the username of the user

    // Create connection
    $mysqli = new mysqli($servername,$username,$password,$db);

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    echo "<br>Connected successfully as user :".$username;

    // Perform query
    $query="SELECT * FROM `vue_all_employe`";
    echo "<br>Performing vue_all_employe :";

    //prepare display tab
    echo '<table border="0" cellspacing="2" cellpadding="2">
      <tr>
          <td> <font face="Arial">ID</font> </td>
          <td> <font face="Arial">PRENOM</font> </td>
          <td> <font face="Arial">NOM</font> </td>
          <td> <font face="Arial">NUMERO</font> </td>
          <td> <font face="Arial">ADRESSE</font> </td>
          <td> <font face="Arial">EMAIL</font> </td>
          <td> <font face="Arial">DATE DE NAISSANCE</font> </td>
      </tr>';

    if ($result = $mysqli -> query($query)) {
        /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $id = $row["id_personne"];
          $prenom = $row["prenom"];
          $nom = $row["nom"];
          $num = $row["numero"];
          $adresse = $row["adresse"];
          $mail = $row["mail"];
          $birthdate = $row["birthdate"];

          echo '<tr>
                 <td>'.$id.'</td>
                 <td>'.$prenom.'</td>
                 <td>'.$nom.'</td>
                 <td>'.$num.'</td>
                 <td>'.$adresse.'</td>
                 <td>'.$mail.'</td>
                 <td>'.$birthdate.'</td>
             </tr>';
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';






    $mysqli -> close();
    echo "<br>Closed conection as user :".$username;
    echo "<br>--------------------------------------------------";

























    //testing connection with user gestionnaire
    $username = "gestionnaire"; // root is default user with every privileges
    $password = "gestionnaire"; // root's default password is "", otherwise the password will be the username of the user

    // Create connection
    $mysqli = new mysqli($servername,$username,$password,$db);

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    echo "<br>Connected successfully as user :".$username;



    // Perform query
    $query="SELECT * FROM `vue_all_gestionnaire`";
    echo "<br>Performing vue_all_gestionnaire :";

    //prepare display tab
    echo '<table border="0" cellspacing="2" cellpadding="2">
      <tr>
          <td> <font face="Arial">ID</font> </td>
          <td> <font face="Arial">PRENOM</font> </td>
          <td> <font face="Arial">NOM</font> </td>
          <td> <font face="Arial">NUMERO</font> </td>
          <td> <font face="Arial">ADRESSE</font> </td>
          <td> <font face="Arial">EMAIL</font> </td>
          <td> <font face="Arial">DATE DE NAISSANCE</font> </td>
      </tr>';

    if ($result = $mysqli -> query($query)) {
        /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $id = $row["id_personne"];
          $prenom = $row["prenom"];
          $nom = $row["nom"];
          $num = $row["numero"];
          $adresse = $row["adresse"];
          $mail = $row["mail"];
          $birthdate = $row["birthdate"];

          echo '<tr>
                 <td>'.$id.'</td>
                 <td>'.$prenom.'</td>
                 <td>'.$nom.'</td>
                 <td>'.$num.'</td>
                 <td>'.$adresse.'</td>
                 <td>'.$mail.'</td>
                 <td>'.$birthdate.'</td>
             </tr>';
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';



























    // Perform query
    $query="CALL view_all_emprunt(1)";
    echo "<br>Performing procedure view_all_emprunt :";





    //prepare display tab
    echo '<table border="0" cellspacing="2" cellpadding="2">
      <tr>
          <td> <font face="Arial">id_emprunnt</font> </td>
          <td> <font face="Arial">dateDebut</font> </td>
          <td> <font face="Arial">dateRetour</font> </td>
          <td> <font face="Arial">prolongeable</font> </td>
          <td> <font face="Arial">recupere</font> </td>
          <td> <font face="Arial">id_produit</font> </td>
          <td> <font face="Arial">id_personne</font></font> </td>
      </tr>';

    if ($result = $mysqli -> query($query)) {
        /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $id = $row["id_emprunt"];
          $prenom = $row["dateDebut"];
          $nom = $row["dateRetour"];
          $num = $row["prolongeable"];
          $adresse = $row["recupere"];
          $mail = $row["id_produit"];
          $birthdate = $row["id_personne"];

          echo '<tr>
                 <td>'.$id.'</td>
                 <td>'.$prenom.'</td>
                 <td>'.$nom.'</td>
                 <td>'.$num.'</td>
                 <td>'.$adresse.'</td>
                 <td>'.$mail.'</td>
                 <td>'.$birthdate.'</td>
             </tr>';
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';



    $mysqli -> close();
    echo "<br>Closed conection as user :".$username;
    echo "<br>--------------------------------------------------";
    ?>

  </body>
</html>
