<?php

	namespace IllDoTomorrowCalendar\controlleurs;

	class ControlleurUtl{
		private $connexionBD;
		private $utlGW;
		private $validateur;
		
		public function __construct(){
			$connexionBD = ConnexionBD::getInstance("dbmidubois1","midubois1","achanger");
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

		public function createUtl(string $pseudo, string $password, string $dateDeNaissance = "", string $email = ""){
			if (is_null($pseudo) || is_null($password)){
				$erreurs[] = "Le pseudo et le mot de passe sont obligatoires";
				return; 
			} 
			$pseudo = $validateur->validerStr($pseudo);
			if ($pseudo == null) $erreurs[] = "pseudo invalide";
			$email = $validateur->validerStr($email);
			if ($email == null) $erreurs[] = "email invalide";
			$dateDeNaissance = $validateur->validerStr($dateDeNaissance);
			if ($dateDeNaissance == null) $erreurs[] = "date de naissance invalide";
			$password = $password->validerStr($password);
			if ($password == null) $erreurs[] = "mot de passe invalide";

			$utlGW->ajouterUtilisateur(new Utilisateur($pseudo, $email, $dateDeNaissance, $password));
		} 
	}
