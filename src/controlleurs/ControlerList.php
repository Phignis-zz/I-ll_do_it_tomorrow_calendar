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

        public function getSpeficList(int $idList) : \IllDoTomorrowCalendar\modeles\metier\ListeTaches {
            try{
                $result = $this->listMod->getSpeficList($idList);
                return $result;
            }
            catch (\Exception $e){
                $erreurs[]=$e->getMessage();
                require("vues/vueErreur.php");
                exit(1);
            }
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

        public function addListPb(string $nomListe){
            $this->listMod->ajouterListeTache(new \IllDoTomorrowCalendar\modeles\metier\ListeTaches($nomListe));
        }

        public function addListPv(string $nomListe) {
            $this->listMod->ajouterListeTache(new \IllDoTomorrowCalendar\modeles\metier\ListeTaches($nomListe, -1, $_SESSION['user']));
        }

        public function delListPb(int $idListe) {
            $this->listMod->supprimerListeTache($idListe);
        }
    }