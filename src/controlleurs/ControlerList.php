<?php

    namespace IllDoTomorrowCalendar\controlleurs;

    class ControlerList{
        private $connexionBD;
		private $ListMod;
		private $validateur;
		
		public function __construct() {
            require_once("DAL/ConnexionBD.php");
            global $base;
            global $login;
            global $mdp;
            try {
                $connexionBD = \IllDoTomorrowCalendar\DAL\ConnexionBD::getInstance("$base","$login","$mdp");
            } catch(\Exception $e) {
                global $erreurs;
                $erreurs[] = $e->getMessage();
                include("vues/vueErreur.php");
                exit(1);
            }
			
            $ListMod = new \IllDoTomorrowCalendar\modeles\ListeTacheModele(
                                new \IllDoTomorrowCalendar\DAL\ListeTachesGateway($connexionBD));
			$validateur = new \IllDoTomorrowCalendar\config\valideurs\ValidateurGenerique();
		}
        //passer par modele

        public function getListPb(int $numPage) : array{
            return $ListMod->getListPb($numPage);
        }

        /**
         * getListPv : Retourne 10 listes privées (correspondant au numéro de page indiqué)
         * appartenant a l'utilisateur connecté
         * Si l'utilisateur n'esp pas connecté renvoie null
         */
        public function getListPv(int $numPage) : array{
            if ($_SESSION['user'] == null) return null;
            else return $ListMod->getListPv($numPage);
        }

        public function addListPb(int $idListe, string $nomListe){
            $ListMod->ajouterListeTache(new ListeTaches($idListe, $nomListe, "", null));
        }

        public function addListPv(int $idListe, string $nomListe, string $proprietaire){
            $ListMod->ajouterListeTache(new ListeTaches($idListe, $nomListe, $proprietaire, null));
        }
    }