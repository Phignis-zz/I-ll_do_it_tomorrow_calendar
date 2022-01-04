<?php

	namespace IllDoTomorrowCalendar\controlleurs;

	class ControlleurUtl{
		private $connexionBD;
		private $utlMdl;
		private $validateur;
		
		public function __construct(){
			require_once("DAL/ConnexionBD.php");
            global $base;
            global $login;
            global $mdp;
			global $erreurs;
			try {
                $this->connexionBD = \IllDoTomorrowCalendar\DAL\ConnexionBD::getInstance("$base","$login","$mdp");
            } catch(\Exception $e) { 
                $erreurs[] = $e->getMessage();
                include("vues/vueErreur.php");
                exit(1);
            }
			$this->utlMdl = new \IllDoTomorrowCalendar\modeles\UtilisateurModele(new \IllDoTomorrowCalendar\DAL\UtilisateurGateway(
				$this->connexionBD
			));
			$this->validateur = new \IllDoTomorrowCalendar\config\valideurs\ValidateurGenerique();
		}
		
		public function connexionUtl(string $pseudo, string $mdp){
			if($pseudo == null){
				$erreurs[] = "Veuillez entrer un pseudo";
				require("vues/vueErreur.php");
				exit(2);
			}
			$pseudo = $this->validateur->validerStr($pseudo);
			if ($pseudo == null){
				$erreurs[] = "Pseudo invalide";
				require("vues/vueErreur.php");
				exit(3);
			}

			if ($mdp == null){
				$erreurs[] = "Veuillez entrer un mot de passe";
				require("vues/vueErreur.php");
				exit(2);
			}
			$mdp = $this->validateur->validerStr($mdp);
			if ($mdp == null){
				$erreurs[] = "Mot de passe invalide";
				require("vues/vueErreur.php");
				exit(3);
			}
			
			$Utl = $this->utlMdl->trouverPseudoEtMdpEncrypt($pseudo, $mdp);
			if ($Utl == null){
				$erreurs[] = "Pseudo et/ou mot de passe invalide";
				require("vues/vueErreur.php");
				exit(4);
			}
			
			$_SESSION['user']=$pseudo;
			
		}

		public function createUtl(string $pseudo, string $password, string $dateDeNaissance = "", string $email = ""){
			if (is_null($pseudo) || is_null($password)){
				$erreurs[] = "Le pseudo et le mot de passe sont obligatoires";
				return; 
			}
			$pseudo = $this->validateur->validerStr($pseudo);
			if ($pseudo == null) $erreurs[] = "pseudo invalide";
			$email = $this->validateur->validerStr($email);
			if ($email == null) $erreurs[] = "email invalide";
			$dateDeNaissance = $this->validateur->validerStr($dateDeNaissance);
			if ($dateDeNaissance == null) $erreurs[] = "date de naissance invalide";
			else $dateDeNaissance = $this->validateur->filtrerDate($dateDeNaissance);
			$password = $this->validateur->validerStr($password);
			if ($password == null) $erreurs[] = "mot de passe invalide";
			try{
				$this->utlMdl->ajouterUtilisateur(new \IllDoTomorrowCalendar\modeles\metier\Utilisateur($pseudo, $email,
						$dateDeNaissance, password_hash($password, PASSWORD_BCRYPT)));
			}
			catch(\Exception $e){
				$erreurs[] = "Le pseudo est déjà utilisé";
				require("vues/vueErreur.php");
				exit(5);
			}
			
		} 
	}
