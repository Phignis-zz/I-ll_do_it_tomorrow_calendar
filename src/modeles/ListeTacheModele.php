<?php

    namespace IllDoTomorrowCalendar\modeles;

	class ListeTacheModele{

		private $listTacheGW;
		private $tachesMdl;

		public function __construct(\IllDoTomorrowCalendar\DAL\ListeTachesGateway $listTacheGW, TacheModele $tachesMdl) {
			$this->listTacheGW = $listTacheGW;
			$this->tachesMdl = $tachesMdl;
		}

		public function getListPb(int $numPage) : array {
			$results = $this->listTacheGW->trouverListTache10($numPage);
			$listes = [];
			foreach ($results as $row){
				$listes[] = new \IllDoTomorrowCalendar\modeles\metier\ListeTaches($row['idListe'], $row['nomListe']);
			}
			return $listes;
		}

		public function getListPv(int $numPage) : array {
			$results = $this->ListTacheGW->trouverListTache10($numPage, $_SESSION['user']);
			$listes = [];
			foreach ($results as $row){
				$listes[] = new ListeTaches($row['idListe'], $row['nomListe'], $row["proprietaire"], null);
			}
			return $listes;
		}
		
		public function trouverListeTacheParID(string $valeurColonne = "") : array {
			$results = $listTacheGW->trouverListeTache('idListe', $valeurColonne);
			$array = [];
			foreach ($results as $row){
				$array[] = new ListeTaches($row['idListe'],$row['nomListe'], null);
			}
			return $array;
		}

		public function trouverListeTacheParPseudoUtl(string $valeurColonne = "") : array{
			$results = $listTacheGW->trouverListeTache('pseudo', $valeurColonne);
			$array = [];
			foreach ($results as $row){
				$array[] = new ListeTaches($row['idListe'],$row['nomListe'],null);
			}
			return $array;
		}

		public function ajouterListeTache(Tache $ajout) : bool {
            return $listTacheGW->ajouterListeTache($ajout);
        }
                
        public function supprimerListeTache(int $idListeTacheSuppression) : bool {
            return $listTacheGW->supprimerListeTache($idListeTacheSuppression);
        }
	}
