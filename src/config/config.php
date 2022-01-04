<?php
        
        // __DIR__ recupere le repertory courant, on enleve donc /config
        $ROOT_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
        $erreurs = [];

        $listActions=['accueil', 'connexion', 'goConnecter', 'deconnexion', 'inscription', 'goInscription',
         'getListPv', 'getListPb', 'addListPv', 'addListPb', 'delListPv', 'delListPb',
          'goContenuListeTache', 'goAddListPb', 'addContenuList', 'delContenuList'];
        
        $base="mysql:host=localhost;dbname=ill_do_it_tomorrow";
        $login="admin";
        $mdp="admin&63";
?>
