<?php

    namespace IllDoTomorrowCalendar\modeles;

	class UtilisateurModele {
        private $utlGW;

        public function __construct(\IllDoTomorrowCalendar\DAL\UtilisateurGateway $utlGW){
            $this->utlGW = $utlGW;
        }

        public function ajouterUtilisateur(\IllDoTomorrowCalendar\modeles\metier\Utilisateur $ajout) {
            $this->utlGW->ajouterUtilisateur($ajout);
        }

        public function trouverPseudoEtMdpEncrypt(string $pseudo, string $mdp): ?metier\Utilisateur {
            $utlTrouves = null;
            foreach($this->utlGW->trouverUtilisateurByPseudo($pseudo) as $row) {
                $utlTrouves = new metier\Utilisateur($row['pseudo'], $row['email'], $row['dateNaissance'], $row['password']);
           }

           if(!is_null($utlTrouves) && password_verify($mdp, $utlTrouves->getMotDePasse())) {
               return $utlTrouves;
           } else {
               return null;
           }
        }
    }