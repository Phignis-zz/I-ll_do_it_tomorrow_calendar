<?php

        namespace IllDoTomorrowCalendar\modeles\metier;

        class Utilisateur {
                
                private $pseudo;
                private $email;
                private $dateNaissance;
                private $motDePasse;
                
                public function __construct(string $pseudo = "", string $email = "", string $dateNaissance = "", string $motDePasse = "") {
                        $this->pseudo = $pseudo;
                        $this->email = $email;
                        $this->dateNaissance = $dateNaissance;
                        $this->motDePasse = $motDePasse;
                }
                
                
                ///////////////////////////////////////////
                // GETTER
                ///////////////////////////////////////////
                
                
                public function getPseudo() : string {
                        return $this->pseudo;
                }
                
                public function getEmail() : string {
                        return $this->email;
                }
                
                public function getDateNaissance() : string {
                        return $this->dateNaissance;
                }
                
                public function getMotDePasse() : string {
                        return $this->motDePasse;
                }
                
                
                ///////////////////////////////////////////
                // SETTER
                ///////////////////////////////////////////
                
                
                public function setPseudo(string $pseudo) {
                        $this->pseudo = $pseudo;
                }
                
                public function setEmail(string $email) {
                        $this->email = $email;
                }
                
                public function setDateNaissance(string $dateNaissance) {
                        $this->dateNaissance = $dateNaissance;
                }
                
                public function setMotDePasse(string $motDePasse) {
                        $this->motDePasse = $motDePasse;
                }
        }
