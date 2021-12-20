<?php
    class ControlerList{
        private $connexionBD;
		private $ListMod;
		private $validateur;
		
		public function __construct(){
			$connexionBD = ConnexionBD.getInstance("dbmidubois1","midubois1","achanger");
            $ListMod = new ListeTachesModele(new ListTachesGateway($connexionBD));
			$validateur = new ValidateurGenerique();
		}
        //passer par modele

        public function getListPb(int $numPage){
            return $ListMod->getListPb($numPage);
        }
    }