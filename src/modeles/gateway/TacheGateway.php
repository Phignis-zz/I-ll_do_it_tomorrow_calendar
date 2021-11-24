<?php

        class TacheGateway {
                
                private $connexionBD;
                
                public __construct(ConnexionBD $bd) {
                        $this->connexionBD = $bd;
                }
                
                public trouverTacheParId(int $idTache) : Tache {
                        $tache = NULL;
                        
                        $query = "SELECT * FROM TACHE WHERE id = :i;";
                        
                        $connexionBD->executerQuery($query, [":i" => [$idTache, PDO::PARAM_INT]]);
                        
                        foreach($connexionBD->recupererResultatQuery() as $row) {
                                $tache = new Tache($row['idTache'], $row['intituleTache'], $row['auteur'], $row['dateTache'], $row['description']);
                        }
                        
                        return $tache;
                }
                
                public trouverTacheParIntitule(string $intituleRecherche) : array {
                        $tachesTrouvees = [];
                        
                        $query = "SELECT * FROM TACHE WHERE intitule = :i;";
                        
                        $connexionBD->executerQuery($query, [":i" => [$intituleRecherche, PDO::PARAM_STR]]);
                        
                        foreach($connexionBD->recupererResultatQuery() as $row) {
                                $tachesTrouvees[] = new Tache($row['idTache'], $row['intituleTache'], $row['auteur'], $row['dateTache'], $row['description']);
                        }
                        
                        return $tachesTrouvees;
                }
                
        }
