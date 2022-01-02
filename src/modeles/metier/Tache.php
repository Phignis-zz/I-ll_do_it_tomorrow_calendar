<?php

        namespace IllDoTomorrowCalendar\modeles\metier;
        
        class Tache {
                private $idTache;
                private $intituleTache;
                private $dateTache;
                private $description;
                
                public function __construct(int $idTache, string $intituleTache, string $dateTache, string $description) {
                        $this->idTache = $idTache;
                        $this->intituleTache = $intituleTache;
                        $this->dateTache = $dateTache;
                        $this->description = $description;
                }
                
                
                ///////////////////////////////////////////
                // GETTER
                ///////////////////////////////////////////
                
                
                public function getIdTache() : int {
                        return $idTache;
                }
                
                public function getIntituleTache() : string {
                        return $intituleTache;
                }
                
                public function getDateTache() : string {
                        return $dateTache;
                }
                
                public function getDescription() : string {
                        return $description;
                }
                
                ///////////////////////////////////////////
                // SETTER
                ///////////////////////////////////////////
                
                
                public function setIdTache(int $idTache) {
                        $this->idTache = $idTache;
                }
                
                public function setIntituleTache(string $intituleTache) {
                        $this->intituleTache = $intituleTache;
                }
                
                public function setDateTache(string $dateTache) {
                        $this->dateTache = $dateTache;
                }
                
                public function setDescription(string $description) {
                        $this->description = $description;
                }
                
                
                ///////////////////////////////////////////
                // METHODES
                ///////////////////////////////////////////
                
                public function __toString() : string {
                        return "tache n°" . $this->idTache . ", intitule: " . $this->intituleTache . ", date de création: " . $this->dateTache .
                                "\n" . $this->description;
                }
                
                
        }
