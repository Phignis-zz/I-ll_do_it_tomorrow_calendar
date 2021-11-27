<?php
        
        require_once("/../modeles/metier/Tache_class.php");
        
        class TacheGateway {
                
                /** connexionBD est la référence a la classe permettant de contacter la BDD */
                private $connexionBD;
                
                public function __construct(ConnexionBD $bd = NULL) {
                        $this->connexionBD = $bd;
                }
                
                /**
                 * trouverTache a pour but 
                 * paramètres:
                 *      colonneRestrictive : la colonne sur lequel le where s'applique, sans where si vide
                 *      valeurColonne : la valeur souhaité pour la colonne où se base le where de la requete
                 * return:
                 *      une array de Tache satisfaisant la potentielle condition de la colonne restrictive
                 */
                public function trouverTache(string $colonneRestrictive = "", string $valeurColonne = "") : array {
                        $tachesTrouvees = [];
                        
                        if($colonneRestrictive == "") $query = "SELECT * FROM TACHE";
                        else $query = "SELECT * FROM TACHE WHERE :nomColonne = :valeurColonne;";
                        
                        $connexionBD->executerQuery($query, ["nomColonne" => [$colonneRestrictive, PDO::PARAM_STR],
                                                                ":valeurColonne" => [$valeurColonne, PDO::PARAM_STR]
                                                        ]);
                        
                        
                        // la conversion en Tache devrait se faire avec TacheModele
                        foreach($connexionBD->recupererResultatQuery() as $row) {
                                $tachesTrouvees[] = new Tache($row['idTache'], $row['intituleTache'], $row['auteur'], $row['dateTache'], $row['description']);
                        }
                        
                        return $tachesTrouvees;
                }
                
        }
