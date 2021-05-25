<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Catalogue</title>
    <link rel="stylesheet" type="text/css" href="../css/consulter_catalogue.css">
  </head>
  <body>

  <?php
  function runMyFunction() {
    $sql=" CALL create_emprunt(".$id.",3)";
    $result=mysqli_query($connection->conn,$sql);
  }

  if (isset($_GET['id'])) {
    runMyFunction();
  }
  ?>
    <nav>
      <ul id="nav">
  			    <li><a href="index.php"> Accueil</a></li>
  					<li><a href="a_propos.php">À propos de la médiathèque</a></li>
  					<li><a href="consulter_catalogue.php">Consulter le catalogue</a></li>
            <li><a href="employe.php">Employe</a></li>
           
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
    session_start();

    require_once  "Connection.php";

    $connection=new Connection();
    $connection->initConnectionAbonne();

    
    echo'<div class="l"> LIVRES </div>';
    echo'<br><br>';
    $query="SELECT * FROM `vue_livre`";
    //prepare display tab
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
                 <td>'.$genre.'</td>';
                 if(isset($_SESSION["compte"])){
                echo'<td> <a href ="consulter_catalogue.php?id="'.$id.'</a> Reserver</td>';
                 }else{
                   echo'<td> <B> veuillez vous connectez pour emprunter les documents </B><td>';
                 }
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';

    //----------------------------------------------------------------------------------------------
    echo'<div class="l"> CD </div>';
    echo'<br><br>';
    $query="SELECT * FROM `vue_CD`";
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
                 <td>'.$duree.'</td>';
                 if(isset($_SESSION["compte"])){
                  echo'<td> <a href ="reserver.php"</a>Reserver</td>';
                   }else{
                     echo'<td> <B> veuillez vous connectez pour emprunter les documents </B><td>';
                   }
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';
//-----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------
echo'<div class="l"> DVD </div>';
echo'<br><br>';
$query="SELECT * FROM `vue_DVD`";
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
             <td>'.$duree.'</td>';
             if(isset($_SESSION["compte"])){
              echo'<td> <a href ="reserver.php"</a>Reserver</td>';
               }else{
                 echo'<td> <B> veuillez vous connectez pour emprunter les documents </B><td>';
               }
  }
  // Free result set
  $result -> free_result();
}
echo '</table>';


    $connection->conn -> close();
    ?>

  </body>
</html>





  
