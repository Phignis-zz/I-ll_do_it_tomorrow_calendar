<?php
        
        namespace IllDoTomorrowCalendar\modeles;
        
        class TacheModele {
                
                private $tacheGateway;
                
                public function __construct(\IllDoTomorrowCalendar\DAL\TacheGateway $tacheGateway) {
                        $this->tacheGateway = $tacheGateway;
                }
                
                public function trouverTacheParId(int $idRecherche) : array {
                        $tachesTrouvees = [];
                        $temp = $this->tacheGateway->trouverTache('id', $idRecherche);
                        
                        foreach($temp as $row) {
                                $tachesTrouvees[] = new Tache($row['idTache'], $row['intituleTache'], $row['dateTache'], $row['description']);
                        }
                        
                        return $tachesTrouvees;
                }
                
                public function trouverTacheParIntitule(string $intituleRecherche) : array {
                        $tachesTrouvees = [];
                        $temp = $this->tacheGateway->trouverTache('intitule', $intituleRecherche);
                        
                        foreach($temp as $row) {
                                $tachesTrouvees[] = new Tache($row['idTache'], $row['intituleTache'], $row['dateTache'], $row['description']);
                        }
                        
                        return $tachesTrouvees;
                }
                
                public function trouverTacheParDate(string $dateRecherchee) : array {
                        $tachesTrouvees = [];
                        $temp = $this->tacheGateway->trouverTache('dateTache', $dateRecherchee);
                        
                        foreach($temp as $row) {
                                $tachesTrouvees[] = new Tache($row['idTache'], $row['intituleTache'], $row['dateTache'], $row['description']);
                        }
                        
                        return $tachesTrouvees;
                }

                public function trouverTacheParIdListe(int $idListe) : array {
                        $tachesTrouvees = [];
                        $temp = $this->tacheGateway->trouverTacheByIdListe($idListe);
                        
                        foreach($temp as $row) {
                                $tachesTrouvees[] = new metier\Tache($row['idTache'], $row['intituleTache'], $row['date'], $row['description']);
                        }
                        return $tachesTrouvees;
                }
                
                public function ajouterTache(Tache $ajout) : bool {
                        return $this->tacheGateway->ajouterTache($ajout);
                }
                
                public function supprimerTache(int $idTacheSuppression) : bool {
                        return $this->tacheGateway->supprimerTache($idTacheSuppression);
                }
        
        }
