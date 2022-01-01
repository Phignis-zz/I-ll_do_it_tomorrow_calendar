<!doctype html>
<html lang="fr">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="ressources/style/bootstrap.min.css">
    <link rel="stylesheet" href="ressources/style/index.css">
    <link rel="stylesheet" href="ressources/style/listpb.css">
    <link rel="stylesheet" href="ressources/style/footer.css">

    <title>Procrastinator Calendar</title>
  </head>
  <body>
      <?php include("ressources/html_parts/header.php") ?> 
      <section>
        <div>
          <div id="tableau">
            <div id="titres-colones">
              <p id ="titre1">Titre de la tâche :</p>
              <p>Date :</p>
              <p>Auteur :</p>
            </div>
            <?php foreach($contenuPage as $row){?>
              <button class="ListeTaches">
                <div>
                  <p id="titre1"><?php $row->$nomListe ?> </p>
                  <p><?php $row->$idListe ?></p>
                  <p>Publique</p>
                </div>
              </button>
            <?php } ?> 
          </div>
        </div>
      </section>
      <?php include("ressources/html_parts/footer.php") ?>
  </body>
</html>
