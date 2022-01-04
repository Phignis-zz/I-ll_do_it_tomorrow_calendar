<?php

        namespace IllDoTomorrowCalendar\DAL;
        
        class UtilisateurGateway {
                
                /** connexionBD est la référence a la classe permettant de contacter la BDD */
                private $connexionBD;
                
                public function __construct(ConnexionBD $bd = NULL) {
                        $this->connexionBD = $bd;
                }
                
                 /**
                 * description:
                 * trouverUtilisateurByPseudo a pour but de trouver une tache répondant au critère de pseudo
                 * paramètres:
                 *      valeurColonne : la valeur souhaité pour la colonne où se base le where de la requete
                 * return:
                 *      une array de Utilisateur satisfaisant la condition de pseudo
                 */
                public function trouverUtilisateurByPseudo(string $valeurColonne = "") : array {
                        $utlTrouves = [];
                        
                        $query = "SELECT * FROM utilisateur WHERE pseudo = :valeurColonne;";
                        
                        $this->connexionBD->executerQuery($query, [":valeurColonne" => [$valeurColonne, \PDO::PARAM_STR]]);
                        
                        return $this->connexionBD->recupererResultatQuery();
                }
                
                /**
                 * description:
                 * ajouterUtilisateur a pour but d'ajouter unn utilisateur passée en paramètre a la bd
                 * paramètres:
                 *      ajout : Instance de la tache à ajouter
                 * return:
                 *      Un boolean.
                 * 		True: Commande exécutée avec succès
                 * 		False: Erreur
                 */
                public function ajouterUtilisateur(\IllDoTomorrowCalendar\modeles\metier\Utilisateur $ajout){
                        $query = "INSERT INTO UTILISATEUR VALUES(:pseudo, :email, :dateNaissance, :motDePasse);";
                        
                        return $this->connexionBD->executerQuery($query, [":pseudo" => [$ajout->getPseudo(), \PDO::PARAM_STR],
                                                                        ":email" => [$ajout->getEmail(), \PDO::PARAM_STR],
                                                                        ":dateNaissance" => [$ajout->getDateNaissance(), \PDO::PARAM_STR],//pas sur ici
                                                                        ":motDePasse" => [$ajout->getMotDePasse(), \PDO::PARAM_STR]]);
                        
                        
                }
                
                /**
                 * description:
                 * supprimerUtilisateur a pour but de supprimer un utilisateur passée en paramètre
                 * paramètres:
                 *      suppression: l'instance de la tâche que l'on doit supprimer
                 * return:
                 *      Un boolean.
                 * 		True: Commande exécutée avec succès
                 * 		False: Erreur
                 */
                public function supprimerUtilisateur(\IllDoTomorrowCalendar\modeles\metier\Utilisateur $suppression) {
                        $query = "DELETE UTILISATEURS WHERE pseudo = :pseudo";
                        return $this->connexionBD->executerQuery($query, [":pseudo" => [$suppression->pseudo, \PDO::PARAM_STR]]);
                }
                
        }

