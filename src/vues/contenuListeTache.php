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
            <div id="tacheSection">
              <?php foreach($contenuPage as $tache) { ?>
                <div id="orgaButtonsList">
                  <button class="ListeTaches">
                    <div>
                      <input type="checkbox" id="termine">
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
              <FORM METHOD="POST" ACTION="index.php?action=updateTermine&idListe=<?= $_REQUEST['idListe'] ?>">
                <?php foreach($contenuPage as $tache) { ?>
                  <div id="orgaButtonsList">
                    <button class="ListeTaches">
                      <div>
                        <input type="checkbox" id="termine" NAME="termineTache<?= $tache->getIdTache() ?>">
                      </div>
                  </div>
                <?php } ?>
                <?php if(count($contenuPage) > 0) { ?> <input type="submit" value="valider les taches terminées"> <?php } ?>
              </FORM>
            </div>
          </div>
        </div>
        <?php if(isset($contenuPage) && count($contenuPage) > 0) { ?>
          <button class="ListeTaches" id="valider"
            onclick="window.location.href='index.php';">
            Valider les checks
          </button> 
        <?php } ?>
        <p id="titreFormAdd">Ajouter une nouvelle tâche :</p>
        <FORM METHOD="POST" ACTION="index.php?action=addContenuList">
          <div>
            <div>
              <label for="titre">Titre :</label>
              <INPUT TYPE="TEXT" NAME="titre" id="titre" class="elargir">
            </div>
            <div>
              <label for="date">Date :</label>
              <INPUT TYPE="TEXT" NAME="date" id="date" class="elargir">
            </div>
            <div>
              <label for="description">Description :</label>
              <INPUT TYPE="TEXT" NAME="description" id="description" class="elargir">
            </div>
            <div id="placeButton">
              <INPUT TYPE="HIDDEN" NAME="action" VALUE="addContenuList">
              <INPUT TYPE="SUBMIT" VALUE="Créer la Tâche" id="addButton" class="elargir">
            </div>
          </div>
        </FORM>
      </section>
      <?php include("ressources/html_parts/footer.php") ?>
  </body>
</html>
