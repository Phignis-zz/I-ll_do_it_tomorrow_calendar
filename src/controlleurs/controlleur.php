<?php

	require_once("../DAL/ConnexionBD_classe.php");
	require_once("../DAL/UtilisateurGateway.php");
	require_once("../config/validateurs/ValidateurGenerique.php");

	class Controlleur {
		public function __construct(){
			session_start();
			try{
				switch ($_REQUEST['action']){
					case 'connexion':
						$controlUtl = new ControlleurUtl();
						$controlUtl->connexionUtl($_REQUEST['pseudo'], $_REQUEST['mdp']);
					default:
						//appel vue err
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
