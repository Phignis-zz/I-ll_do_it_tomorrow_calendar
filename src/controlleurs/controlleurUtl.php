<?php
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
			$pseudo = $validateur->validerStr($pseudo);
			if ($pseudo == null){
				//erreur validation
			}
			
			$mdp = $validateur6->validerStr($mdp);
			if ($mdp == null){
				//erreur validation
			}
			
			$Utl = $utlGw->trouverPseudoEtMdp($pseudo, $mdp);
			if ($Utl == null){
				//utl pas trouve
			}
			
			$_SESSION['pseudo']=$pseudo;
		}
			
