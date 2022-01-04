<?php
        namespace IllDoTomorrowCalendar\DAL;

        class ListeTachesGateway {
                
                /** connexionBD est la référence a la classe permettant de contacter la BDD */
                private $connexionBD;
                
                public function __construct(ConnexionBD $bd = NULL) {
                        $this->connexionBD = $bd;
                }

                public function trouverListTache10(int $numPage, string $utl = ""){
                        if(is_null($this->connexionBD)) {
                                throw new \Exception("Pas de connexion à une base de donnée pour retrouver les taches");
                        }
                        // calcul du numéro de tache a partir duquel afficher pour OFFSET qui ne permet pas les calculs
                        $numTache = ($numPage -1) * 10; // 
                        if ($utl == ""){
                                $query = "SELECT * FROM LISTETACHE WHERE proprietaire IS NULL LIMIT 10 OFFSET :numTache;";
                                $this->connexionBD->executerQuery($query, [":numTache" => [$numTache, \PDO::PARAM_INT]]);    
                        }
                        else {
                                $query = "SELECT * FROM LISTETACHE WHERE proprietaire=:utl LIMIT 10 OFFSET :numTache";
                                $this->connexionBD->executerQuery($query, [":numTache" => [$numTache, \PDO::PARAM_INT],
                                                                        ":utl" => [$utl, \PDO::PARAM_STR]]);
                        }                               
                        return $this->connexionBD->recupererResultatQuery();
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
                        
                        if($colonneRestrictive == "") {
                                $query = "SELECT * FROM LISTETACHE";
                                $this->connexionBD->executerQuery($query);
                        }
                        else {
                                $query = "SELECT * FROM LISTETACHE WHERE :nomColonne = :valeurColonne;";

                                if($colonneRestrictive == "idListe") {
                                        $valeurColonne = (int) $valeurColonne;
                                        if(!$this->connexionBD->executerQuery($query, [":nomColonne" => ["idListe", \PDO::PARAM_STR],
                                                                        ":valeurColonne" => [$valeurColonne, \PDO::PARAM_INT]
                                                                ])) echo "l'execution s'est mal passé";
                                }
                                else {
                                        $this->connexionBD->executerQuery($query, [":nomColonne" => [$colonneRestrictive, \PDO::PARAM_STR],
                                                                        ":valeurColonne" => [$valeurColonne, \PDO::PARAM_STR]
                                                                ]);
                                }
                        }

                                                        
                        return $this->connexionBD->recupererResultatQuery();
                }

                public function trouverListeTacheByID(int $valeurColonne) : array {
                        $listeTacheTrouvees = [];

                        $query = "SELECT * FROM listetache WHERE idListe = :valeurColonne";
                        $this->connexionBD->executerQuery($query, [":valeurColonne" => [$valeurColonne, \PDO::PARAM_INT]]);
                                                        
                        return $this->connexionBD->recupererResultatQuery();
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
                public function ajouterListeTaches(\IllDoTomorrowCalendar\modeles\metier\ListeTaches $ajout) {
                        $query = "INSERT INTO LISTETACHE VALUES(:idListe, :nomListe, :proprietaire);";
                        
                        if ($ajout->getIdListe() == -1) $idList = NULL;
                        else $idList = $ajout->getIdListe();
                        if ($ajout->getProprietaire() == "") $proprietaire = NULL;
                        else $proprietaire = $ajout->getProprietaire();
                        return $this->connexionBD->executerQuery($query, [":idListe" => [$idList, \PDO::PARAM_INT],
                                                                                ":nomListe" => [$ajout->getNomListe(), \PDO::PARAM_STR],
                                                                                ":proprietaire" => [$proprietaire, \PDO::PARAM_STR]]);
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
                public function supprimerListeTaches(int $idList) {
                        $query = "DELETE FROM LISTETACHE WHERE idListe = :idListe;";
                        $this->connexionBD->executerQuery($query, [":idListe" => [$idList, \PDO::PARAM_INT]]);
                }
                
        }
