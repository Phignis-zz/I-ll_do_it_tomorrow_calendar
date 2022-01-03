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
              <p id ="titre1">Titre de la liste de tâches :</p>
              <p>Id Unique :</p>
              <p>Appartenance :</p>
            </div>
            <?php foreach($contenuPage as $row){?>
              <a href = "index.php?action=voirListeTache&idTache=<?= $row->getIdListe(); ?>" class="ListeTachesLien" >
                <button class="ListeTaches">
                  <div>
                    <p id="titre1"><?= $row->getNomListe(); ?> </p>
                    <p><?= $row->getIdListe(); ?></p>
                    <p>Publique</p>
                  </div>
                </button>
              </a>
            <?php } ?> 
          </div>
        </div>
        <p id="titreFormAdd">Ajouter une nouvelle liste de tâches publique :</p>
        <FORM METHOD="POST" ACTION="index.php?action=addListPb">
          <div>
            <div>
              <label for="titre">Titre :</label>
              <INPUT TYPE="TEXT" NAME="titre" id="titre">
            </div>
            <INPUT TYPE="HIDDEN" NAME="action" VALUE="addListPb">
            <INPUT TYPE="SUBMIT" VALUE="Créer la liste Publique" id="addButton">
          </div>
        </FORM>
      </section>
      <?php include("ressources/html_parts/footer.php") ?>
  </body>
</html>
