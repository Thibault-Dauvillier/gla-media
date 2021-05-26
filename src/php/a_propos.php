<?php /*require('sharedFiles/pageStart.inc.php');*/ ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="a">
        <title> Médiathèque GTA en ligne </title>
        <link rel="stylesheet" type="text/css" href="../css/index.css">
		<?php /* include('sharedFiles/style.inc.php');
		 include('sharedFiles/javascript.inc.php'); */?>

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
  <div class = bouton_connexion ><a href="aboutRules.php">Se connecter</a></div>

        <?php /*require('sharedfile/header.inc.php'); */?>
        <div class = "title">
            <h1>A propos de la médiathèque</h1>
        </div>
        <div class="box">
				<h3>Adresse : 16 Rue des Sénéchaux, Coursac, 24430</h3>
        <h3>Horraires:</h3>
        <h3>Lundi: 9-17h </h3>
        <h3>Mardi: 9-17h </h3>
        <h3>Mercredi: 8-18h </h3>
        <h3>Jeudi: 8-18h </h3>
        <h3>Vendredi: 9-12h </h3>
      </div>
      <!--<p>Travail fait par Alexandre , Thibault , Ghenima</p></br>

      <p>Encadreurs : </p>
      <nav>
        <ul>
          <li><a>Mailys</a></li>

        </ul>
        <ul>
          <li><a >Burkhart Wolff</a></li>
        </ul>
      </nav>
-->
    	</body>
</html
