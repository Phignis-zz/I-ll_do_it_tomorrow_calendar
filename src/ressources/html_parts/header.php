<header>
    <div id="titre">
      <div id="text_titre">
        <h1>
          The
          <img id="img_titre" src="ressources/images/logo.png" alt="o">
          Calendar
        </h1>
      </div>
      <div id="account_buttons">
        <!-- le but ici est d'afficher se deco si jamais on est co -->
        <?php if(!isset($_SESSION["user"]) || empty($_SESSION["user"])) { ?>
          <a href="index.php?action=goConnecter">
            <button>
              <p>Se Connecter</p>
            </button>
          </a>
        <?php } else  { ?>
          <a href="index.php?action=deconnexion">
            <button>
              <p>Se Déconnecter</p>
            </button>
          </a>
        <?php } ?>

        <a href="index.php?action=goInscription">
          <button>
            <p>S'Inscrire</p>
          </button>
        </a>
      </div>
    </div>
    <nav>
      <ul>
        
        <li>
          <a href="index.php?action=getListPb">
            <button>
              <p>Listes de tâches publiques</p>
            </button>
          </a>
        </li>
        <li>
          <a href="index.php?action=getListPv">
            <button>
              <p>Listes de tâches privées</p>
            </button>
          </a>
        </li>
      </ul>
    </nav>
</header>