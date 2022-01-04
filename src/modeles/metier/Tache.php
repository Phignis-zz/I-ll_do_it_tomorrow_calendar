<?php

        namespace IllDoTomorrowCalendar\modeles\metier;
        
        class Tache {
                private $idTache;
                private $intituleTache;
                private $dateTache;
                private $description;
                
                public function __construct(string $intituleTache, string $dateTache, string $description, int $idTache = -1) {
                        $this->idTache = $idTache;
                        $this->intituleTache = $intituleTache;
                        $this->dateTache = $dateTache;
                        $this->description = $description;
                }
                
                
                ///////////////////////////////////////////
                // GETTER
                ///////////////////////////////////////////
                
                
                public function getIdTache() : int {
                        return $this->idTache;
                }
                
                public function getIntituleTache() : string {
                        return $this->intituleTache;
                }
                
                public function getDateTache() : string {
                        return $this->dateTache;
                }
                
                public function getDescriptionTache() : string {
                        return $this->description;
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
