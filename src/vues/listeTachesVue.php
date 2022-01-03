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
            <div id="description_tache">
              <p>id de la liste: <?= $listeTacheAAfficher->getIdListe(); ?></p>
              <p>nom de la liste : <?= $listeTacheAAfficher->getNomListe(); ?></p>
              <?php if(!is_null($listeTacheAAfficher->getProprietaire())) { ?>
                  <p>idListe: <?= $listeTacheAAfficher->getProprietaire(); ?></p>
              <?php } ?>
            </div>
            <div id="titres-colones">
              <p id ="titre1">Titre de la tâche :</p>
              <p>Date :</p>
              <p>Description :</p>
            </div>
            <?php foreach($listeTacheAAfficher->getListeTache() as $tache) { ?>
              <button class="ListeTaches">
                <div>
                  <p id="titre1"><?= $tache->getIntituleTache(); ?> </p>
                  <p><?= $tache->getDateTache(); ?></p>
                  <p><?= $tache->getDescriptionTache(); ?></p>
                </div>
              </button>
            <?php } ?> 
          </div>
        </div>
      </section>
      <?php include("ressources/html_parts/footer.php") ?>
  </body>
</html>
