<?php

	require_once("../DAL/ListeTachesGateway.php");
	require_once("../modeles/metier/ListeTaches_classe.php");
        
        namespace IllDoTomorrowCalendar\Modeles;

	class ListeTacheModele{

		private $ltacheGW;

		public function __constructor(ListeTachesGateway $ltacheGW){
			this->$ltacheGW = $ltacheGW;
		}

		public function trouverListeTacheParID(string $valeurColonne = "") : array {
			$results = ltacheGW->trouverListeTache('idListe', $valeurColonne);
			$array = [];
			for ($results as $row){
				$array[] = new ListeTaches($row['idListe'],$row['nomListe'],null)
			}
			return $array;
		}

		public function trouverListeTacheParPseudoUtl(string $valeurColonne = "") : array{
			$results = ltacheGW->trouverListeTache('pseudo', $valeurColonne);
			$array = [];
			for ($results as $row){
				$array[] = new ListeTaches($row['idListe'],$row['nomListe'],null)
			}
			return $array;
		}

		public function ajouterListeTache(Tache $ajout) : bool {
            return $ltacheGW->ajouterListeTache($ajout);
        }
                
        public function supprimerListeTache(int $idListeTacheSuppression) : bool {
            return $ltacheGW->supprimerListeTache($idListeTacheSuppression);
        }
	}
