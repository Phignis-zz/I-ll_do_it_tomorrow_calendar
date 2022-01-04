<?php

	namespace IllDoTomorrowCalendar\controlleurs;
		
	class FrontControler {
		public function __construct(){

			global $ROOT_PATH, $erreurs, $listActions;

			session_start();

			if(!isset($_REQUEST['action'])) { // on arrive pour la première fois sur le site, on arrive sur l'accueil
				$controlList = new ControlerList();
				$contenuPage = $controlList->getListPb(1);
				require("vues/listpb.php");
				return;
			}

			try{
				if (in_array($_REQUEST['action'], $listActions)){
					switch ($_REQUEST['action']){
						case 'accueil' :
							break;
						case 'goConnecter':
							require("vues/connexion.php");
							break;
						case 'connexion':
							$controlUtl = new ControlleurUtl();
							$controlUtl->connexionUtl($_REQUEST['pseudo'], $_REQUEST['mdp']);

							$this->affichListPb();
							break;
						case 'deconnexion':
							unset($_SESSION["user"]); // deconnexion
							// relancer le home
							$contenuPage = (new ControlerList())->getListPb(1);
							require("vues/listpb.php");
							break;
						case 'goInscription':
							require("vues/inscription.php");
							break;
						case 'inscription':
							$controlUtl = new ControlleurUtl();
							$controlUtl->createUtl($_REQUEST['pseudo'], $_REQUEST['mdp'], $_REQUEST['ddn'], $_REQUEST['email']);

							$this->affichListPb();
							break;
						case 'getListPv':
							$controlList = new ControlerList();
							if (!isset($_SESSION['user']) || $_SESSION['user'] == null){
								require("vues/connexion.php");
								break;
							}
							$this->affichListPv();
							break;	
						case 'getListPb':
							$controlList = new ControlerList();
							if (isset($_REQUEST['numPage'])) $contenuPage = $controlList->getListPb($_REQUEST['numPage']);
							else $contenuPage = $controlList->getListPb(1);
							require("vues/listpb.php");
							break;
						case 'addListPv':
							$controlList = new ControlerList();
							if (!isset($_SESSION['user']) || $_SESSION['user'] == null){
								require("vues/connexion.php");
								break;
							}
							$controlList->addListPv($_REQUEST['titre']);
							$this->affichListPv();
							break;
						case 'addListPb':
							$controlList = new ControlerList();
							$controlList->addListPb($_REQUEST['titre']);
							$contenuPage = $controlList->getListPb(1);
							require("vues/listpb.php");
							break;
						case 'delListPb':
							$controlList = new ControlerList();
							$liste = $controlList->getSpeficList($_REQUEST['idTache']);
							if ($liste->getProprietaire() != NULL){
								$erreurs[] = "Vous ne pouvez pas supprimer une liste qui ne vous appartient pas !";
								require("vues/vueErreur.php");
								break;
							}
							$controlList->delListPb($_REQUEST['idTache']);
							$this->affichListPb();
							break;
						case 'delListPv':
							$controlList = new ControlerList();
							if (!isset($_SESSION['user']) || $_SESSION['user'] == null){
								require("vues/connexion.php");
								break;
							}
							$liste = $controlList->getSpeficList($_REQUEST['idTache']);
							if ($liste->getProprietaire() != $_SESSION['user']){
								$erreurs[] = "Vous ne pouvez pas supprimer une liste qui ne vous appartient pas !";
								require("vues/vueErreur.php");
								break;
							}
							$controlList->delListPb($_REQUEST['idTache']);
							$this->affichListPv();
							break;
						case 'addTache':
							break;
						case 'delTache':
							break;
						case 'voirListeTache':
							// on veut voir le détail d'une liste de tache, identifié par son id unique
							if(!isset($_GET["idTache"])) { // on ne sait sur quelle tache rediriger
								$erreurs[] = "La tache a afficher n'est pas connu";
								require("vues/vueErreur.php");
							} else {
								// on connait la liste de tache a afficher, on la recupère donc
								(new ControlerList())->getListDetail($_GET["idTache"]);
							}
							break;
						default:
							require("vues/vueErreur.php");
							//appel vue err
					}
				}
			}
			catch(Exception $e){
				//ajout message exception a tab erreur
				//appel vue erreur
			}
		}
		private function affichListPb(){
			$controlList = new ControlerList();
			if (isset($_REQUEST['numPage'])) $numPage = $_REQUEST['numPage'];
			else $numPage = 1;
			$contenuPage = $controlList->getListPb($numPage);
			require("vues/listpb.php");
		}

		/**
		 * affichListPv
		 * Affiche la liste des liste de taches de l'utilisateur connecté
		 * /!\ Vérifier si l'utilisateur est connecté avant appel, sinon comportement indéterminé
		 */
		private function affichListPv(){
			$controlList = new ControlerList();
			if (isset($_REQUEST['numPage'])) $numPage = $_REQUEST['numPage'];
			else $numPage = 1;
			$contenuPage = $controlList->getListPv($numPage);
			require("vues/listpv.php");
		}
		
	}
