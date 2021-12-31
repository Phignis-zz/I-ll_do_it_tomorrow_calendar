<?php

	namespace IllDoTomorrowCalendar\controlleurs;
		
	class FrontControler {
		public function __construct(){

			global $ROOT_PATH, $erreurs, $listActions;

			session_start();

			$_SESSION['user'] = null;

			if(!isset($_REQUEST['action'])) { // on arrive pour la première fois sur le site, on arrive sur l'accueil
				require("vues/listpb.php");
				return;
			}

			try{
				if (in_array($_REQUEST['action'], $listActions)){
					switch ($_REQUEST['action']){
						case 'accueil' :
							require("vues/listpb.php");
							break;
						case 'connexion':
							$controlUtl = new ControlleurUtl();
							$controlUtl->connexionUtl($_REQUEST['pseudo'], $_REQUEST['mdp']);
						case 'getListPv':		
						case 'getListPb':
							$controlList = new ControlerList();
							$controlList->getListPb($_REQUEST['numPage']);
						case 'addListPv':
							$controlList = new ControlerList();
							$controlList->addListPb($_REQUEST['idListe'], $_REQUEST['nomListe'], $_REQUEST['proprietaire']);
						case 'addListPb':
							$controlList = new ControlerList();
							$controlList->addListPb($_REQUEST['idListe'], $_REQUEST['nomListe']);
						case 'delListPb':
							$controlList = new ControlerList();
							$controlList->delListP;
						case 'delListPv':
						case 'addTache':
						case 'delTache':
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
		/*
		private getUtilisateur(string $pseudo){
			if($validateur->validerStr($pseudo)){
				return $utlGW->trouverUtilisateur("pseudo",$pseudo);
			}
			//tab err
		}
		
		public addUtilisateur(string $pseudo, string $email, string $ddn, string $mdp){
			if (validateur->validerStr($pseudo) && validateur->validerStr($email) && validateur->validerStr($ddn) && validateur->validerStr($mdp)){
				$utlGW->ajouterUtilisateur(new Utilisateur($pseudo, $email, $ddn, $mdp));
				return;
			}
			//tab err
		}
		
		public delUtilisateur(string $pseudo, string $email, string $ddn, string $mdp){
			if (validateur->validerStr($pseudo) && validateur->validerStr($email) && validateur->validerStr($ddn) && validateur->validerStr($mdp)){
				$utlGW->supprimerUtilisateur(new Utilisateur($pseudo, $email, $ddn, $mdp));
				return;
			}
			//tab err
		}*/
	}
