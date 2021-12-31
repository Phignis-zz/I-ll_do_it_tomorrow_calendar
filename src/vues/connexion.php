<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="ressources/style/connexion.css">

    <title>Procrastinator Calendar</title>
  </head>
  <body>
    <?php include("ressources/html_parts/header.php") ?>
    <section>
      <h1>Connexion : </h1>
    
      <FORM METHOD="POST" ACTION="../controlleurs/controlleur.php">
        <label for="pseudo">Pseudo :</label>
        <INPUT TYPE="TEXT" NAME="pseudo" id="pseudo">
			  <label for="mdp">Mot de passe :</label>
        <INPUT TYPE="TEXT" NAME="mdp" id="mdp">
        <INPUT TYPE="HIDDEN" NAME="action" VALUE="connexion">
        <INPUT TYPE="SUBMIT" VALUE="Connexion">
      </FORM>
		</section>
    
    <?php include("ressources/html_parts/footer.php") ?>
  </body>
</html>
