<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Catalogue</title>
    <link rel="stylesheet" type="text/css" href="../css/consulter_catalogue.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">


    function Reservation(){
      alert('Veuillez vous connecter pour pouvoir emprunter nos documents');
    }
    </script>

  </head>
  <body>
    <nav>
      <ul id="nav">
            <li><a href="index.php"> Accueil</a></li>
            <li><a href="Aporopos.php">À propos de la médiathèque</a></li>
            <li><a href="consulter_catalogue.php">consulter le catalogue</a></li>
            <li><a href="aboutOpenHours.php">help</a></li>
            <li><a href="aboutOpenHours.php">Se connecter</a></li>
      </ul>	
    </nav>
    <h2>Consulter le Catalogue</h2><br>
    
    <div class= rech>
    <form action="recherche.php" method="post">
        <input  type="text" name="nom" id ="nom" placeholder="Search" aria-label="Search"required/>
        <input  type="submit" value="Recherche Par titre"/>
        <input  type="submit" value="Recherche Par description "/>
        <input  type="submit" value="Recherche Par auteur "/>
      <input  type="submit" value="Recherche Par genre "/></form>
    
    <input  type ="submit" value="Recherche Par disponibilité" onclick= "window.location.href ='recherche_par_dispo.php'"/>
</div>
    <?php
    require_once "Connection.php";

    
    
    // Perform query
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

    if ($result = $mysqli -> query($query)) {
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
                 <td>  <button id ="des" onclick="Reservation()">Reserver</button></td>
             </tr>';
      }
      // Free result set
      $result -> free_result();
    }
    echo '</table>';


    $mysqli -> close();
    ?>

  </body>
</html>