<?php

    namespace IllDoTomorrowCalendar\controlleurs;

    class ControlerList{
        private $connexionBD;
		private $listMod;
		private $validateur;
		
		public function __construct() {
            require_once("DAL/ConnexionBD.php");
            global $base;
            global $login;
            global $mdp;
            try {
                $this->connexionBD = \IllDoTomorrowCalendar\DAL\ConnexionBD::getInstance("$base","$login","$mdp");
            } catch(\Exception $e) {
                global $erreurs;
                $erreurs[] = $e->getMessage();
                include("vues/vueErreur.php");
                exit(1);
            }

            $tmp = new \IllDoTomorrowCalendar\DAL\ListeTachesGateway($this->connexionBD);
            if(!isset($tmp)) echo "chelou <br />";
            $tmp1 = new \IllDoTomorrowCalendar\modeles\TacheModele(new \IllDoTomorrowCalendar\DAL\TacheGateway($this->connexionBD));
            if(!isset($tmp)) echo "chelou1 <br />";
			
            $this->listMod = new \IllDoTomorrowCalendar\modeles\ListeTacheModele($tmp, $tmp1);
			$this->validateur = new \IllDoTomorrowCalendar\config\valideurs\ValidateurGenerique();
		}
        //passer par modele

        public function getListPb(int $numPage) {
            return $this->listMod->getListPb($numPage);
        }

        public function addListPb(int $idListe, string $nomListe) {
            $this->ListMod->ajouterListeTache(new ListeTaches($idListe, $nomListe, "", null));
        }

        public function addListPv(int $idListe, string $nomListe, string $proprietaire) {
            $this->ListMod->ajouterListeTache(new ListeTaches($idListe, $nomListe, $proprietaire, null));
        }
    }