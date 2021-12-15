<?php
<<<<<<< HEAD
  
    namespace IllDoTomorrowCalendar\Modeles;
=======

        namespace IllDoTomorrowCalendar\Modeles;

>>>>>>> 1178d90f39906522e51498d9251578a1c7a81104
	require_once("../DAL/ListeTachesGateway.php");
	require_once("../modeles/metier/ListeTaches_classe.php");

	class ListeTacheModele{

		private $ListTacheGW;

		public function __constructor(ListeTachesGateway $ltacheGW){
			this.$ListTacheGW = $ListTacheGW;
		}

		public function getListPb(int $numPage) : array {
			$results = $ListTacheGW->trouverListTache10($numPage);
			$listes = [];
			foreach ($results as $row){
				$listes[] = new ListeTaches($row['idListe'], $row['nomListe'], null);
			}
			return $listes;
		}
		
		public function trouverListeTacheParID(string $valeurColonne = "") : array {
			$results = $ListTacheGW->trouverListeTache('idListe', $valeurColonne);
			$array = [];
			foreach ($results as $row){
				$array[] = new ListeTaches($row['idListe'],$row['nomListe'],null);
			}
			return $array;
		}

		public function trouverListeTacheParPseudoUtl(string $valeurColonne = "") : array{
			$results = $ListTacheGW->trouverListeTache('pseudo', $valeurColonne);
			$array = [];
			foreach ($results as $row){
				$array[] = new ListeTaches($row['idListe'],$row['nomListe'],null);
			}
			return $array;
		}

		public function ajouterListeTache(Tache $ajout) : bool {
            return $ListTacheGW->ajouterListeTache($ajout);
        }
                
        public function supprimerListeTache(int $idListeTacheSuppression) : bool {
            return $ListTacheGW->supprimerListeTache($idListeTacheSuppression);
        }
	}
