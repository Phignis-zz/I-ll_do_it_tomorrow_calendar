<?php

        namespace IllDoTomorrowCalendar\DAL;
        
        require_once("../modeles/metier/Tache_classe.php");
        require_once("../modeles/ConnexionBD_classe.php");
        
        class TacheGateway {
                
                /** connexionBD est la référence a la classe permettant de contacter la BDD */
                private $connexionBD;
                
                public function __construct(ConnexionBD $bd = NULL) {
                        $this->connexionBD = $bd;
                }
                
                public setConnexionBD(ConnexionBD $bd) {
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
                        
                        if($colonneRestrictive == "") $query = "SELECT * FROM TACHE";
                        else $query = "SELECT * FROM TACHE WHERE :nomColonne = :valeurColonne;";
                        
                        $connexionBD->executerQuery($query, ["nomColonne" => [$colonneRestrictive, PDO::PARAM_STR],
                                                                ":valeurColonne" => [$valeurColonne, PDO::PARAM_STR]
                                                        ]);
                        
                        
                        // la conversion en Tache doit se faire avec TacheModele
                        return $connexionBD->recupererResultatQuery();
                }
                
                /**
                 * description:
                 * ajouterTache a pour but d'ajouter une tache passée en paramètre a la bd
                 * paramètres:
                 *      ajout : Instance de la tache à ajouter
                 * return:
                 *      Un boolean.
                 * 		True: Commande exécutée avec succès
                 * 		False: Erreur
                 */
                public function ajouterTache(Tache $ajout) : bool {
                        $query = "INSERT INTO TACHE VALUES(:id, :intitule, :date, :description, NULL);";
                        
                        return $this->connexionBD->executeQuery($query, [":id" => [$ajout->idTache, PDO::PARAM_INT],
                                                                                ":intitule" => [$ajout->intituleTache, PDO::PARAM_STR],
                                                                                ":date" => [$ajout->dateTache, PDO::PARAM_STR],
                                                                                ":description" => [$ajout->description, PDO::PARAM_STR]]);
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
                public function supprimerTache(Tache $suppression) : bool {
                        $query = "DELETE TACHE WHERE id = :i";
                        return $this->connexionBD->executerQuery($query, [":i" => [$suppression->idTache, PDO::PARAM_INT]]);
                }
                
        }

