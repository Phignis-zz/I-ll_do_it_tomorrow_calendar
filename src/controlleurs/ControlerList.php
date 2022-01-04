<?php

    namespace IllDoTomorrowCalendar\controlleurs;

    class ControlerList{
        private $connexionBD;
		private $listMod;
        private $tacheMod;
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

            $this->listMod = new \IllDoTomorrowCalendar\modeles\ListeTacheModele(
                new \IllDoTomorrowCalendar\DAL\ListeTachesGateway($this->connexionBD));
            $this->tacheMod = new \IllDoTomorrowCalendar\modeles\TacheModele(
                new \IllDoTomorrowCalendar\DAL\TacheGateway($this->connexionBD));
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

        public function addListPb(string $nomListe){
            $this->listMod->ajouterListeTache(new \IllDoTomorrowCalendar\modeles\metier\ListeTaches($nomListe));
        }

        public function addListPv(string $nomListe) {
            $this->listMod->ajouterListeTache(new \IllDoTomorrowCalendar\modeles\metier\ListeTaches($nomListe, -1, $_SESSION['user']));
        }

        public function delListPb(int $idListe) {
            $this->listMod->supprimerListeTache($idListe);
        }

        public function getContenuListe(int $idListe, int $numPage = 1) : array {
            return $this->tacheMod->trouverTacheParIdListe10($idListe, $numPage);
        }

        public function ajouterTacheAListe(int $idListe, string $titre, string $date, string $description){
            $this->tacheMod->ajouterTacheAListe($idListe, new \IllDoTomorrowCalendar\modeles\metier\Tache($titre, $date, $description));
        }

        public function delTache(int $idTache){
            $this->tacheMod->delTache($idTache);
        }

        public function getListDeLaTacheDonee(int $idTache) : \IllDoTomorrowCalendar\modeles\metier\ListeTaches{
            return $this->listMod->getListDeLaTacheDonee($idTache);
        }
    }