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
            <li><a href="Aporopos.php">À propos de la médiathèque</a></li>
            <li><a href="consulter_catalogue.php">consulter le catalogue</a></li>
            <li><a href="aboutOpenHours.php">help</a></li>
            <li><a href="aboutOpenHours.php">Se connecter</a></li>
      </ul>	
    </nav>
    <h2>Consulter le Catalogue</h2><br>
    
    <div class= rech>
    <form action="recherche.php" method="post">
        <input  type="text" name="nom" id ="nom" placeholder="Search" aria-label="Search"  />
        <input  type="submit" value="Recherche Par titre"/>
        <input  type="submit" value="Recherche Par description "/>
        <input  type="submit" value="Recherche Par auteur "/>
        <input  type="submit" value="Recherche Par genre "/></form>
    
    <input  type ="submit" value="Recherche Par disponibilité" onclick= "window.location.href ='recherche_par_dispo.php'"/>
</div>
<?php
require_once "Connection.php";
$nom = $_POST['nom'];
$query="SELECT * FROM `vue_livre` where titre = '$nom'";
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
           <td> <a href ="reserver.php"</a>Reserver</td>
       </tr>';
}
// Free result set
$result -> free_result();
}

//---------------------------
$query1="SELECT * FROM `vue_livre` where description = '$nom'";


if ($result = $mysqli -> query($query1)) {
 

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
           <td> <a href ="reserver.php"</a>Reserver</td>
       </tr>';
}
// Free result set
$result -> free_result();
}
//---------------------------------------------------
$query2="SELECT * FROM `vue_livre` where auteur = '$nom'";


if ($result = $mysqli -> query($query2)) {
 

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
           <td> <a href ="reserver.php"</a>Reserver</td>
       </tr>';
}
// Free result set
$result -> free_result();
}
//--------------------------------------------------
$query3="SELECT * FROM `vue_livre` where nom_genre = '$nom'";


if ($result = $mysqli -> query($query3)) {
 

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
           <td> <a href ="reserver.php"</a>Reserver</td>
       </tr>';
}
// Free result set
$result -> free_result();
}
echo '</table>';

?>

</body>
</html>