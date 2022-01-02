<?php

        namespace IllDoTomorrowCalendar\modeles\metier;

        class ListeTaches {
			         
                private $idListe;
                private $nomListe;
                private $listeTache;
                private $proprietaire;
                
                /**
                 * description: constructeur de ListeTaches.
                 * paramètres:
                 *      idListe : id de la liste de tache
                 *      nomListe : nom de la liste
                 * 		listeTache : liste de tâches
                 */
                public function __construct(int $idListe, string $nomListe, string $proprietaire = "", array $listeTache = []){
                        $this->idListe = $idListe;
                        $this->nomListe = $nomListe;
                        $this->listeTache = $listeTache;
                        $this->proprietaire = $proprietaire;
                }

                public function getNomListe() : string {
                        return $this->nomListe;
                }

                public function getIdListe() : int {
                        return $this->idListe;
                }
                
                /**
                 * description:
                 * ajoutTache ajoute une tache donnée en paramètre a sa liste de taches
                 * paramètres:
                 *      ajout : tache a ajouter
                 */
                public function ajoutTache(Tache $ajout) {
                        $this->listeTache[] = $ajout;
                }
                
                /**
                 * description:
                 * supprimerTache retire les taches présentes dans suppression
                 * paramètres:
                 *      suppression : liste des taches a retirer
                 */
                public function supprimerTache(array $suppression = []) {
                        array_diff($this->listeTache, $suppression); // enleve tout éléments de suppression présent dans listTask
                        // a besoin du __toString pour fonctionner
                }
                
                public function setListeTache(array $listeTache) {
			$this->listeTache = $listeTache;
                }
        }
