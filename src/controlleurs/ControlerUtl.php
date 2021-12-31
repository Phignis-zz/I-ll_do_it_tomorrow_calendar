<?php

	namespace IllDoTomorrowCalendar\controlleurs;

	class ControlleurUtl{
		private $connexionBD;
		private $utlGW;
		private $validateur;
		
		public function __construct(){
			$connexionBD = ConnexionBD.getInstance("dbmidubois1","midubois1","achanger");
			$utlGW = new UtilisateurGateway($connexionBD);
			$validateur = new ValidateurGenerique();
		}
		
		public function connexionUtl(string $pseudo, string $mdp): boolean {
			if($pseudo == null){
				$erreurs[] = "Veuillez entrer un pseudo";
			}
			$pseudo = $validateur->validerStr($pseudo);
			if ($pseudo == null){
				$erreurs[] = "Pseudo invalide";
			}

			if ($mdp == null){
				$erreurs[] = "Veuillez entrer un mot de passe";
			}
			$mdp = $validateur6->validerStr($mdp);
			if ($mdp == null){
				$erreurs[] = "Mot de passe invalide";
			}
			
			$Utl = $utlGw->trouverPseudoEtMdp($pseudo, $mdp);
			if ($Utl == null){
				$erreurs[] = "Pseudo et/ou mot de passe invalide";
			}
			
			$_SESSION['user']=$pseudo;
		}
	}
