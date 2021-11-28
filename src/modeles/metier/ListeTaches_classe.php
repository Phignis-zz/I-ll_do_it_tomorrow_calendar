<?php

        class ListeTaches {
                
                private $listTask;
                
                public function __construct(array $listTask = []) {
                        $this->listTask = $listTask;
                }
                
                public function ajoutTache(Tache $ajout) {
                        $listTask[] = $ajout;
                }
                
                public function supprimerTache(array $suppression = []) {
                        array_diff($listTask, $suppression); // enleve tout éléments de suppression présent dans listTask
                        // a besoin du __toString pour fonctionner
                }
        }
