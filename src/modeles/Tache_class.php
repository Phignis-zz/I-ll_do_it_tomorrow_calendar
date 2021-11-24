<?php

        class Tache {
                private $idTache;
                private $intituleTache;
                private $auteur;
                private $dateTache;
                private $description;
                
                public __construct(int $idTache, string $intituleTache, string $auteur, string $dateTache, string $description) {
                        $this->idTache = $idTache;
                        $this->intituleTache = $intituleTache;
                        $this->auteur = $auteur;
                        $this->dateTache = $dateTache;
                        $this->description = $description;
                }
                
                
                ///////////////////////////////////////////
                // GETTER
                ///////////////////////////////////////////
                
                
                public function GetIdTache() : int {
                        return $idTache;
                }
                
                public function GetIntituleTache() : string {
                        return $intituleTache;
                }
                
                public function GetAuteur() : string {
                        return $auteur;
                }
                
                public function GetDateTache() : string {
                        return $dateTache;
                }
                
                public function GetDescription() : string {
                        return $description;
                }
                
                ///////////////////////////////////////////
                // SETTER
                ///////////////////////////////////////////
                
                
                public function SetIdTache(int $idTache) {
                        $this->idTache = $idTache;
                }
                
                public function SetIntituleTache(string $intituleTache) {
                        $this->intituleTache = $intituleTache;
                }
                
                public function SetAuteur(string $auteur) {
                        $this->auteur = $auteur;
                }
                
                public function SetDateTache(string $dateTache) {
                        $this->dateTache = $dateTache;
                }
                
                public function SetDescription(string $description) {
                        $this->description = $description;
                }
                
                
        }
