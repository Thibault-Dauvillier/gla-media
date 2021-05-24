<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Catalogue</title>
    <link rel="stylesheet" type="text/css" href="css/consulter_catalogue.css">
  </head>
  <body>
    <nav>
      <ul id="nav">
            <li><a href="index.php"> Accueil</a></li>
            <li><a href="Aporopos.php">À propos de la médiathèque</a></li>
            <li><a href="catalogue.php">consulter le catalogue</a></li>
            <li><a href="aboutOpenHours.php">help</a></li>
      </ul>	
    </nav>
    <h2>Consulter le Catalogue</h2><br>
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
$nom = $_POST['nom'];
$query="SELECT * FROM `vue_livre` where titre='$nom'";
echo'<form class=" " action="recherche.php" method="POST">';
    echo'   <input class="" type="text" name="nom" placeholder="Search" aria-label="Search">';
    echo'<button class="rech"  type="submit">Recherche</button>';
    echo'  </form>';
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
echo '</table>';


$mysqli -> close();
?>

</body>
</html>