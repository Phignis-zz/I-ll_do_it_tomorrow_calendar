<?php
        namespace IllDoTomorrowCalendar\DAL;
        
        require_once("../modeles/metier/ListeTaches_classe.php");
        require_once("../modeles/ConnexionBD_classe.php");
        class ListeTachesGateway {
                
                /** connexionBD est la référence a la classe permettant de contacter la BDD */
                private $connexionBD;
                
                public function __construct(ConnexionBD $bd = NULL) {
                        $this->connexionBD = $bd;
                }

                public function trouverListTache10(int $numPage, string $utl = ""){
                        $listeTacheTrouvees = [];
                        if ($utl == ""){
                                $query = "SELECT * FROM LISTETACHE LIMIT 10 OFFSET (:numPage-1)*10;";
                                $connexionBD->executerQuery($query, [":numPage" => [$numPage, PDO::PARAM_INT]]);    
                        }
                        else {
                                $query = "SELECT * FROM LISTETACHE WHERE nomUtl=:utl LIMIT 10 OFFSET (:numPage-1)*10;";
                                $connexionBD->executerQuery($query, [":numPage" => [$numPage, PDO::PARAM_INT],
                                                                        ":utl" => [$utl, PDO::PARAM_STR]]);
                        }                               
                        return $connexionBD->recupererResultatQuery();
                }
                
                 /**
                 * description:
                 * trouverListeTache a pour but de trouver une liste répondant au critère de "colonneRestrictive",
                 * si on a aucune restriction, on retourne la totalité de la table
                 * paramètres:
                 *      colonneRestrictive : la colonne sur lequel le where s'applique, sans where si vide
                 *      valeurColonne : la valeur souhaité pour la colonne où se base le where de la requete
                 * return:
                 *      une array de résultat satisfaisant la potentielle condition de la colonne restrictive
                 */
                public function trouverListeTache(string $colonneRestrictive = "", string $valeurColonne = "") : array {
                        $listeTacheTrouvees = [];
                        
                        if($colonneRestrictive == "") $query = "SELECT * FROM LISTETACHE";
                        else $query = "SELECT * FROM LISTETACHE WHERE :nomColonne = :valeurColonne;";
                        
                        $connexionBD->executerQuery($query, ["nomColonne" => [$colonneRestrictive, PDO::PARAM_STR],
                                                                ":valeurColonne" => [$valeurColonne, PDO::PARAM_STR]
                                                        ]);
                                                        
                        return $connexionBD->recupererResultatQuery();
                }
                
                /**
                 * description:
                 * ajouterListeTaches a pour but d'ajouter une liste de tache passée en paramètre a la bd
                 * paramètres:
                 *      ajout : Instance de la tache à ajouter
                 * return:
                 *      Un boolean.
                 * 		True: Commande exécutée avec succès
                 * 		False: Erreur
                 */
                public function ajouterListeTaches(ListeTaches $ajout) {
                        $query = "INSERT INTO LISTETACHE VALUES(:idListe, :nomListe);";
                        
                        return $this->connexionBD->executeQuery($query, [":idListe" => [$ajout->idListe, PDO::PARAM_INT],
                                                                                ":nomListe" => [$ajout->nomListe, PDO::PARAM_STR]]);
                }
                
                /**
                 * description:
                 * supprimerListeTaches a pour but de supprimer un utilisateur passé en paramètre
                 * paramètres:
                 *      idListeSuppression: l'id de la liste que l'on doit supprimer
                 * return:
                 *      Un boolean.
                 * 		True: Commande exécutée avec succès
                 * 		False: Erreur
                 */
                public function supprimerListeTaches(int $idListeSuppression) {
                        $query = "DELETE LISTETACHE WHERE idListe = :idListe";
                        return $this->connexionBD->executerQuery($query, [":idListe" => [$suppression->pseudo, PDO::PARAM_INT]]);
                }
                
        }
