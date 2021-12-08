<?php

	require_once("../DAL/ConnexionBD_classe.php");
	require_once("../DAL/UtilisateurGateway.php");
	require_once("../config/validateurs/ValidateurGenerique.php");
        
        namespace IllDoTomorrowCalendar\Controlleurs;

	class Controlleur {
		private $connexionBD;
		private $utlGW;
		private $validateur;
		
		public function __construct(){
			$connexionBD = ConnexionBD.getInstance("dbmidubois1","midubois1","achanger");
			$utlGW = new UtilisateurGateway($connexionBD);
			$validateur = new ValidateurGenerique();
		}
		
		public getUtilisateur(string $pseudo){
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
		}
