<!doctype html>
<html lang="fr">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="ressources/style/bootstrap.min.css">
    <link rel="stylesheet" href="ressources/style/index.css">
    <link rel="stylesheet" href="ressources/style/contenuListeTache.css">
    <link rel="stylesheet" href="ressources/style/footer.css">

    <title>Procrastinator Calendar</title>
  </head>
  <body>
      <?php include("ressources/html_parts/header.php") ?> 
      <section>
        <div>
          <div id="tableau">
            <div id="titres-colones">
              <p id="titre1" class="autresTitres">Titre de la tâche :</p>
              <p class="autresTitres">Date :</p>
              <p class="autresTitres">ID :</p>
              <p id="titre4" >Description :</p>
            </div>
            <?php foreach($contenuPage as $tache) { ?>
              <div id="orgaButtonsList">
                <button class="ListeTaches">
                  <div>
                    <p class="autresContenus"><?= $tache->getIntituleTache(); ?> </p>
                    <p class="autresContenus"><?= $tache->getDateTache(); ?></p>
                    <p class="autresContenus"><?= $tache->getIdTache(); ?></p>
                    <p id="contenu4"><?= $tache->getDescriptionTache(); ?></p>
                  </div>
                </button>
                <button class="ListeTaches" id="delete"
                onclick="window.location.href='index.php?action=delContenuList&idTache=<?= $tache->getIdTache(); ?>';">
                  X
                </button>
              </div>
            <?php } ?>  
          </div>
        </div>
        <p id="titreFormAdd">Ajouter une nouvelle tâche :</p>
        <FORM METHOD="POST" ACTION="index.php?action=addContenuList">
          <div>
            <div>
              <label for="titre">Titre :</label>
              <INPUT TYPE="TEXT" NAME="titre" id="titre" >
            </div>
            <div>
              <label for="date">Date :</label>
              <INPUT TYPE="TEXT" NAME="date" id="date">
            </div>
            <div>
              <label for="description">Description :</label>
              <INPUT TYPE="TEXT" NAME="description" id="description">
            </div>
            <div id="placeButton">
              <INPUT TYPE="HIDDEN" NAME="action" VALUE="addContenuList">
              <INPUT TYPE="SUBMIT" VALUE="Créer la Tâche" id="addButton">
            </div>
          </div>
        </FORM>
      </section>
      <?php include("ressources/html_parts/footer.php") ?>
  </body>
</html>
