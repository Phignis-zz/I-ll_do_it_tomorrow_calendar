
<!--
        Le but de ce fichier est de fournir un footer au projet "The I'll do it tomorrow Calendar".
        Il n'a pas pour but d'être appelé seul, expliquant l'absance de balises html, head ou body
-->
<footer>
        <div>
                <img src="ressources/images/logo.png" alt="o">
        </div>
        <div>
                <p>
                        <?php echo (isset($_SESSION["user"]) && !empty($_SESSION["user"])) ? $_SESSION["user"] : "Anonymous"; ?>
                </p>
        </div>
        <div id="credits">
                <p>By:</p>
                <p>DUBOIS Mickaël</p>
                <p>FOUCRAS Baptiste</p>     
        </div>
</footer>
