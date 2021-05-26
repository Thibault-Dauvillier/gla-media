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
              echo '<li><a href="deconnection.php">Se deconnecter</a></li>
	      	    <li><a href="../html/login.html">Se connecter</a></li>';
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
  <div class = bouton_connexion ><a href="../html/login.html">Se connecter</a></div>

        <?php /*require('sharedfile/header.inc.php'); */?>
        <div class = "title">
            <h1>Médiathèque GTA</h1>
        </div>
        <div class="box">
				<h3> Bienvenue dans l’espace en ligne de la médiathèque GTA , ceci est un espace de partage et d’échange en ligne ,vous pouvez a tout moment consulter les différents documents que vous proposent la médiathèque à savoir des livres ,des CD ainsi que des DVD ,dans différents genres.
        Si un document vous intéresse et que vous souhaitez l’emprunter, c’est simple ! commencez tout d’abord par vous inscrire à la médiathèque en suivant le lien se connecter sur votre gauche, de ce fait vous aurez un identifiant client qui va vous permettre d’emprunter ou de réserver des documents à tout moment, bien sûr selon les disponibilités.
        Une fois votre compte crée, vous pouvez vous connecter à tout moment et effectuer des emprunts ou bien des réservations.
        Pensez à consulter plus souvent  notre site, afin de découvrir les nouveautés :)
        Bonne visite :)</h3>
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
