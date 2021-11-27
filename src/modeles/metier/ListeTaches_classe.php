<?php

        class ListeTaches {
                
                private $listTask;
                
                public function __construct(array $listTask = []) {
                        this->listTask = $listTask;
                }
                
                public function ajoutTache(Tache $ajout) {
                        $listTask[] = $ajout;
                }
                
                public function supprimerTache(Tache $suppression) {
                        
                }
        }
