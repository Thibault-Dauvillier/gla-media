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
            <h1>Médiathèque GTA</h1>
        </div>
        <div class="box">
				<h3> Cette médiathèque est une médiathèque virtuelle, créer dans le but du Projet de GLA de l'année 2020-2021.
        Moi j'aurais bien aimer la faire en Angular et React, ça aurait pu etre trop bien, mais malheuresement j'ai trop la flemme, en plus Angular ça a l'air long et tout.
        Après React c'est bien aussi mais pareil c'est long. Vue.js ça a l'air vraiment une bonne alternative mais c'est un petit peu plus limiter
        Mais c'est tout aussi bien. Mais ce que j'aurais vraiment aimer faire c'est du GraphQL, enfaite c'est un un type de querry trop bien pour manipuler des APIs.</h3>
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
