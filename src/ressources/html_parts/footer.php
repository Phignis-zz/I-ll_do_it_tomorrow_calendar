
<!--
        Le but de ce fichier est de fournir un footer au projet "The I'll do it tomorrow Calendar".
        Il n'a pas pour but d'être appelé seul, expliquant l'absance de balises html, head ou body
-->

<footer>
        <div class="d-flex justify-content-around" id="footer_flex_div">
                <p id="nom_page_paragraphe">
                        <?php
                                $ROOT_PATH = "C:/Baptiste/IUT/2A_IUT/projets/php_projet/git_php_projet";
                        
                                // la variable $nomPage contient normalement le nom de la page censée être display
                                if(!isset($nomPage) || empty($nomPage)) $nomPage = "Unknown";
                                echo $nomPage;
                        ?>
                </p>
                <img src="<?php echo $ROOT_PATH . "/src/ressources/images/logo.png";?>" alt="logo application.png">
                
                <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                                DUBOIS Mickaël
                        </li>
                        <li class="nav-item mb-2">
                                FOUCRAS Baptiste
                        </li>
                        <li class="nav-item mb-2">
                                The I'll do it tomorrow calendar
                        </li>
                </ul>
        </div>
</footer>
