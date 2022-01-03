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
            global $erreurs;
            try {
                $this->connexionBD = \IllDoTomorrowCalendar\DAL\ConnexionBD::getInstance("$base","$login","$mdp");
            } catch(\Exception $e) {
                global $erreurs;
                $erreurs[] = $e->getMessage();
                include("vues/vueErreur.php");
                exit(1);
            }

            $tmp = new \IllDoTomorrowCalendar\DAL\ListeTachesGateway($this->connexionBD);
            $tmp1 = new \IllDoTomorrowCalendar\modeles\TacheModele(new \IllDoTomorrowCalendar\DAL\TacheGateway($this->connexionBD));
			
            $this->listMod = new \IllDoTomorrowCalendar\modeles\ListeTacheModele($tmp, $tmp1);
			$this->validateur = new \IllDoTomorrowCalendar\config\valideurs\ValidateurGenerique();
		}
        //passer par modele

        public function getListPb(int $numPage) : array {
            return $this->listMod->getListPb($numPage);
        }

        /**
         * getListPv : Retourne les listes privées par 10 (correspondant au numéro de page indiqué)
         * appartenant a l'utilisateur connecté
         * /!\ Si l'utilisateur n'est pas connecté, comportement indéterminé
         */
        public function getListPv(int $numPage) : array{
            return $this->listMod->getListPv($numPage);
        }

        public function getListDetail(int $idListe) {
            $listeTacheAAfficher = $this->listMod->trouverListeTacheParID($idListe);
            include("vues/listeTachesVue.php");
        }

        public function addListPb(int $idListe, string $nomListe){
            $listMod->ajouterListeTache(new ListeTaches($idListe, $nomListe, "", null));
        }

        public function addListPv(int $idListe, string $nomListe, string $proprietaire) {
            $this->listMod->ajouterListeTache(new ListeTaches($idListe, $nomListe, $proprietaire, null));
        }
    }