
<!--
        Le but de ce fichier est de proposer un header a inclure a chaque début de page html du site "I'll Do It Tomorrow Calendar"
        Il n'a pas sens à être appelé seul, expliquant l'absance des balises html
-->
        
<header>
        <?php
                // intégration de la partie d'affichage du profil connecté, ou l'option de connexion
                if(!isset($_SESSION("pseudo"))) {
                        require();
                }
                else {
                        require();
                }
                
        ?> 
</header>
