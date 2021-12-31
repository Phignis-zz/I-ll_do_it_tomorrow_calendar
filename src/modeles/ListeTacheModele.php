<?php

        namespace IllDoTomorrowCalendar\modeles;

	require_once("../DAL/ListeTachesGateway.php");
	require_once("../modeles/metier/ListeTaches_classe.php");

	class ListeTacheModele{

		private $ListTacheGW;
		private $tachesMdl;

		public function __constructor(ListeTachesGateway $ltacheGW, TacheModele $tachesMdl){
			this.$ListTacheGW = $ListTacheGW;
			this.$tachesMdl = $tachesMdl;
		}

		public function getListPb(int $numPage) : array {
			$results = $ListTacheGW->trouverListTache10($numPage);
			$listes = [];
			foreach ($results as $row){
				$listes[] = new ListeTaches($row['idListe'], $row['nomListe'],
				 $tachesMdl->trouverTacheParId($row['idListe']));
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
