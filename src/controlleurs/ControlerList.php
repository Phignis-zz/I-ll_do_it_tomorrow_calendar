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

        public function addListPb(int $idListe, string $nomListe){
            $ListMod->ajouterListeTache(new ListeTaches($idListe, $nomListe, "", null));
        }

        public function addListPv(int $idListe, string $nomListe, string $proprietaire){
            $ListMod->ajouterListeTache(new ListeTaches($idListe, $nomListe, $proprietaire, null));
        }
    }