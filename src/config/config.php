<?php
        
        // __DIR__ recupere le repertory courant, on enleve donc /config
        $ROOT_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
        $erreurs = [];

        $listActions=['accueil', 'connexion', 'getListPv', 'getListPb', 'addListPv', 'addListPb', 'delListPv', 'delListPb', 'addTache', 'delTache'];
        
?>
