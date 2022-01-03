<!doctype html>
<html lang="fr">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="ressources/style/bootstrap.min.css">
    <link rel="stylesheet" href="ressources/style/index.css">
    <link rel="stylesheet" href="ressources/style/addListPb.css">
    <link rel="stylesheet" href="ressources/style/footer.css">

    <title>Procrastinator Calendar</title>
  </head>
  <body>
      <?php include("ressources/html_parts/header.php") ?> 
      <section>
        <FORM METHOD="POST" ACTION="index.php?action=addListPb">
            <label for="titre">Titre de la nouvelle liste publique :</label>
            <INPUT TYPE="TEXT" NAME="titre" id="titre">
            <INPUT TYPE="HIDDEN" NAME="action" VALUE="addListPb">
            <INPUT TYPE="SUBMIT" VALUE="Valider">
        </FORM>
      </section>
      <?php include("ressources/html_parts/footer.php") ?>
  </body>
</html>