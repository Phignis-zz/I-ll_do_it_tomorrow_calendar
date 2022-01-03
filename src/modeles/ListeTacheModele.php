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
				$listes[] = new \IllDoTomorrowCalendar\modeles\metier\ListeTaches($row['nomListe'], $row['idListe']);
			}
			return $listes;
		}

		public function getListPv(int $numPage) : array {
			$results = $this->listTacheGW->trouverListTache10($numPage, $_SESSION['user']);
			$listes = [];
			foreach ($results as $row){
				$listes[] = new metier\ListeTaches($row['nomListe'], $row['idListe'], $row["proprietaire"]);
			}
			return $listes;
		}
		
		public function trouverListeTacheParID(int $valeurColonne = 0) : metier\ListeTaches {
			$results = $this->listTacheGW->trouverListeTacheByID($valeurColonne);
			$listeTrouve = null;
			// on recupere d'abord les infos de la liste
			foreach ($results as $row){
				$listeTrouve = new metier\ListeTaches($row['idListe'],$row['nomListe'], null);
			}
			//ensuite ceux des taches assossiées
			$tachesAssociees = $this->tachesMdl->trouverTacheParIdListe($valeurColonne);
			foreach ($tachesAssociees as $tache){
				$listeTrouve->ajoutTache($tache);
			}
			return $listeTrouve;
		}

		public function trouverListeTacheParPseudoUtl(string $valeurColonne = "") : array{
			$results = $listTacheGW->trouverListeTache('pseudo', $valeurColonne);
			$array = [];
			foreach ($results as $row){
				$array[] = new ListeTaches($row['idListe'],$row['nomListe'], null);
			}
			return $array;
		}

		public function ajouterListeTache(\IllDoTomorrowCalendar\modeles\metier\ListeTaches $ajout) : bool {
            return $this->listTacheGW->ajouterListeTaches($ajout);
        }
                
        public function supprimerListeTache(int $idListeTacheSuppression) : bool {
            return $this->listTacheGW->supprimerListeTache($idListeTacheSuppression);
        }
	}
