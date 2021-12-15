<?php
        
        namespace IllDoTomorrowCalendar\Modeles;
        
        require_once("../DAL/TacheGateway.php");
        
        class TacheModele {
                
                private $tacheGateway;
                
                public function __construct(TacheGateway $tacheGateway) {
                        $this->tacheGateway = $tacheGateway;
                }
                
                public function trouverTacheParId(int $idRecherche) : array {
                        $tachesTrouvees = [];
                        $temp = $tacheGateway->trouverTache('id', $idRecherche);
                        
                        foreach($temp as $row) {
                                $tachesTrouvees[] = new Tache($row['idTache'], $row['intituleTache'], $row['dateTache'], $row['description']);
                        }
                        
                        return $tachesTrouvees;
                }
                
                public function trouverTacheParIntitule(string $intituleRecherche) : array {
                        $tachesTrouvees = [];
                        $temp = $tacheGateway->trouverTache('intitule', $intituleRecherche);
                        
                        foreach($temp as $row) {
                                $tachesTrouvees[] = new Tache($row['idTache'], $row['intituleTache'], $row['dateTache'], $row['description']);
                        }
                        
                        return $tachesTrouvees;
                }
                
                public function trouverTacheParDate(string $dateRecherchee) : array {
                        $tachesTrouvees = [];
                        $temp = $tacheGateway->trouverTache('dateTache', $dateRecherchee);
                        
                        foreach($temp as $row) {
                                $tachesTrouvees[] = new Tache($row['idTache'], $row['intituleTache'], $row['dateTache'], $row['description']);
                        }
                        
                        return $tachesTrouvees;
                }
                
                public function ajouterTache(Tache $ajout) : bool {
                        return $tacheGateway->ajouterTache($ajout);
                }
                
                public function supprimerTache(int $idTacheSuppression) : bool {
                        return $tacheGateway->supprimerTache($idTacheSuppression);
                }
        
        }
