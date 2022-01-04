<?php

        namespace IllDoTomorrowCalendar\DAL;
        
        class TacheGateway {
                
                /** connexionBD est la référence a la classe permettant de contacter la BDD */
                private $connexionBD;
                
                public function __construct(ConnexionBD $bd = NULL) {
                        $this->connexionBD = $bd;
                }
                
                public function setConnexionBD(ConnexionBD $bd) {
                        $this->connexionBD = $bd;
                }
                
                /**
                 * description:
                 * trouverTache a pour but de trouver une tache répondant au critères de "colonneRestrictive",
                 * si on a aucune restriction, on retourne la totalité de la table
                 * paramètres:
                 *      colonneRestrictive : la colonne sur lequel le where s'applique, sans where si vide
                 *      valeurColonne : la valeur souhaité pour la colonne où se base le where de la requete
                 * return:
                 *      une array de row de Tache satisfaisant la potentielle condition de la colonne restrictive
                 */
                public function trouverTache(string $colonneRestrictive = "", string $valeurColonne = "") : array {
                        
                        if($colonneRestrictive == "") {
                                $query = "SELECT * FROM TACHE";
                                $this->connexionBD->executerQuery($query);
                        }
                        else {
                                $query = "SELECT * FROM TACHE WHERE :nomColonne = :valeurColonne;";
                        
                                if($colonneRestrictive == "idListe") {
                                        $valeurColonne = (int) $valeurColonne;
                                        $this->connexionBD->executerQuery($query, [":nomColonne" => [$colonneRestrictive, \PDO::PARAM_STR],
                                                                        ":valeurColonne" => [4, \PDO::PARAM_INT]
                                                                ]);
                                }
                                else {
                                        $this->connexionBD->executerQuery($query, [":nomColonne" => [$colonneRestrictive, \PDO::PARAM_STR],
                                                                        ":valeurColonne" => [$valeurColonne, \PDO::PARAM_STR]
                                                                ]);
                                }
                        }
                        
                        
                        // la conversion en Tache doit se faire avec TacheModele
                        return $this->connexionBD->recupererResultatQuery();
                }

                public function trouverTacheParIdListe10(int $valeurColonne = null, $numPage = 1) : array {
                        $numTache = ($numPage -1) * 10;
                        $query = "SELECT * FROM TACHE WHERE idListe = :valeurColonne LIMIT 10 OFFSET :numPage;";
                        $this->connexionBD->executerQuery($query, [":valeurColonne" => [$valeurColonne, \PDO::PARAM_INT],
                                                                        ":numPage" => [$numTache, \PDO::PARAM_INT]]);
                        return $this->connexionBD->recupererResultatQuery();
                }
                
                
                /**
                 * description:
                 * ajouterTache a pour but d'ajouter une tache passée en paramètre a la bd
                 * paramètres:
                 *      ajout : Instance de la tache à ajouter
                 */
                public function ajouterTache(\IllDoTomorrowCalendar\modeles\metier\Tache $ajout, int $idListe) {
                        $query = "INSERT INTO TACHE VALUES(NULL, :intitule, :date, :description, :estTermine, :idListe);";
                        
                        $estTermine = ($ajout->estTacheTermine()) ? 1 : 0;

                        $this->connexionBD->executerQuery($query, [":intitule" => [$ajout->getIntituleTache(), \PDO::PARAM_STR],
                                                                        ":date" => [$ajout->getDateTache(), \PDO::PARAM_STR],
                                                                        ":description" => [$ajout->getDescriptionTache(), \PDO::PARAM_STR],
                                                                        ":estTermine" => [$estTermine, \PDO::PARAM_INT],
                                                                        ":idListe" => [$idListe, \PDO::PARAM_INT]]);
                }
                
                /**
                 * description:
                 * supprimerTache a pour but de supprimer une tache passée en paramètre
                 * paramètres:
                 *      suppression: l'instance de la tâche que l'on doit supprimer
                 * return:
                 *      Un boolean.
                 * 		True: Commande exécutée avec succès
                 * 		False: Erreur
                 */
                public function supprimerTache(int $idTache){
                        $query = "DELETE FROM TACHE WHERE idTache = :i";
                        $this->connexionBD->executerQuery($query, [":i" => [$idTache, \PDO::PARAM_INT]]);
                }
                
        }

