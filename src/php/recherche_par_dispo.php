<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Catalogue</title>
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
    <h2>Consulter le Catalogue</h2><br>

    <div class= rech>
    <form action="recherche.php" method="post">
        <input  type="text" name="nom" id ="nom" placeholder="Search" aria-label="Search"required/>
        <input  type="submit" value="Recherche Par titre"/>
        <input  type="submit" value="Recherche Par auteur "/>
      <input  type="submit" value="Recherche Par genre "/>

    <input  type ="submit" value="Recherche Par disponibilité" onclick= "window.location.href ='recherche_par_dispo.php'"/>
    </form>
  </div>


    <?php

    require_once  "Connection.php";

    $connection=new Connection();
    $connection->initConnectionAbonne();;

    echo'<div class="l"> LIVRES </div>';
    echo'<br><br>';
    $query="SELECT * FROM `vue_livre` where quantite !=0";
    echo '<table id="produit" border="10" cellspacing="2" cellpadding="2">
      <tr>
          <td> <h3>ID</h3></td>
          <td> <h3><font face="Arial">Titres</font></h3> </td>
          <td> <h3><font face="Arial">Description</font> </h3></td>
          <td> <h3><font face="Arial">date de parution</font> </h3></td>
          <td> <h3><font face="Arial">Nombre d\'exemplaires</font></h3> </td>
          <td><h3> <font face="Arial">Auteur</font></h3> </td>
          <td><h3> <font face="Arial">Genre</font> </h3></td>
          <td> <h3><font face="Arial">Reserver</font></h3> </td>
      </tr>';

    if ($result = $connection->conn -> query($query)) {
        /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $id = $row["id_livre"];
          $titre = $row["titre"];
          $description= $row["description"];
          $date = $row["date_parution"];
          $quantite = $row["quantite"];
          $auteur = $row["auteur"];
          $genre = $row["nom_genre"];

          echo '<tr>
                 <td>'.$id.'</td>
                 <td>'.$titre.'</td>
                 <td>'.$description.'</td>
                 <td>'.$date.'</td>
                 <td>'.$quantite.'</td>
                 <td>'.$auteur.'</td>
                 <td>'.$genre.'</td>
                <td> <a href ="reserver.php"</a>Reserver</td>';
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';

    //----------------------------------------------------------------------------------------------
    echo'<div class="l"> CD </div>';
    echo'<br><br>';
    $query="SELECT * FROM `vue_CD` where quantite !=0";
    //prepare display tab
    echo '<table id="produit" border="10" cellspacing="2" cellpadding="2">
      <tr>

          <td> <h3>ID</h3></td>
          <td> <h3><font face="Arial">Titres</font></h3> </td>
          <td> <h3><font face="Arial">Description</font> </h3></td>
          <td> <h3><font face="Arial">date de parution</font> </h3></td>
          <td> <h3><font face="Arial">Nombre d\'exemplaires</font></h3> </td>
          <td><h3> <font face="Arial">compositeur</font></h3> </td>
          <td><h3> <font face="Arial">Genre</font> </h3></td>
          <td><h3> <font face="Arial">Duree</font> </h3></td>
          <td> <h3><font face="Arial">Reserver</font></h3> </td>


      </tr>';

    if ($result = $connection->conn -> query($query)) {
        /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $id = $row["id_cd"];
          $titre = $row["titre"];
          $description= $row["description"];
          $date = $row["date_parution"];
          $quantite = $row["quantite"];
          $auteur = $row["compositeur"];
          $genre = $row["nom_genre"];
          $duree = $row["duree"];

          echo '<tr>
                 <td>'.$id.'</td>
                 <td>'.$titre.'</td>
                 <td>'.$description.'</td>
                 <td>'.$date.'</td>
                 <td>'.$quantite.'</td>
                 <td>'.$auteur.'</td>
                 <td>'.$genre.'</td>
                 <td>'.$duree.'</td>
                <td> <a href ="reserver.php"</a>Reserver</td>';
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';
//-----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------
echo'<div class="l"> DVD </div>';
echo'<br><br>';
$query="SELECT * FROM `vue_DVD` where quantite !=0";
//prepare display tab
echo '<table id="produit" border="10" cellspacing="2" cellpadding="2">
  <tr>

      <td> <h3>ID</h3></td>
      <td> <h3><font face="Arial">Titres</font></h3> </td>
      <td> <h3><font face="Arial">Description</font> </h3></td>
      <td> <h3><font face="Arial">date de parution</font> </h3></td>
      <td> <h3><font face="Arial">Nombre d\'exemplaires</font></h3> </td>
      <td><h3> <font face="Arial">Realisateur</font></h3> </td>
      <td><h3> <font face="Arial">Genre</font> </h3></td>
      <td><h3> <font face="Arial">Duree</font> </h3></td>
      <td> <h3><font face="Arial">Reserver</font></h3> </td>


  </tr>';

if ($result = $connection->conn -> query($query)) {
    /* fetch associative array */
  while ($row = $result->fetch_assoc()) {
      $id = $row["id_dvd"];
      $titre = $row["titre"];
      $description= $row["description"];
      $date = $row["date_parution"];
      $quantite = $row["quantite"];
      $auteur = $row["realisateur"];
      $duree = $row["duree"];
      $genre = $row["nom_genre"];

      echo '<tr>
             <td>'.$id.'</td>
             <td>'.$titre.'</td>
             <td>'.$description.'</td>
             <td>'.$date.'</td>
             <td>'.$quantite.'</td>
             <td>'.$auteur.'</td>
             <td>'.$genre.'</td>
             <td>'.$duree.'</td>
            <td> <a href ="reserver.php"</a>Reserver</td>';
  }
  // Free result set
  $result -> free_result();
}
echo '</table>';

?>
  </body>
</html>
