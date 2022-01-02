<?php

    namespace IllDoTomorrowCalendar\modeles;

	class UtilisateurModele{
        private $utlGW;

        public function __construct(\IllDoTomorrowCalendar\DAL\UtilisateurGateway $utlGW){
            $this->utlGW = $utlGW;
        }

        public function ajouterUtilisateur(\IllDoTomorrowCalendar\modeles\metier\Utilisateur $ajout) {
            $this->utlGW->ajouterUtilisateur($ajout);
        }

        public function trouverPseudoEtMdp(string $pseudo, string $mdp): array {
            $utlTrouves[];
            foreach($this->utlGW->trouverPseudoEtMdp($pseudo, $mdp) as $row) {
                $utlTrouves[] = new Utilisateur($row['pseudo'], $row['email'], $row['dateNaissance'], $row['motDePasse']);
           }
           return $utlTrouves;
        }