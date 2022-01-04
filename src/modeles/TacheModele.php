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

                public function trouverTacheParIdListe10(int $idListe, int $numPage = 1) : array {
                        $tachesTrouvees = [];
                        $temp = $this->tacheGateway->trouverTacheParIdListe10($idListe, $numPage);
                        
                        foreach($temp as $row) {
                                if ($row['intituleTache'] == null) $intituleTache = "";
                                else $intituleTache = $row['intituleTache'];
                                if ($row['date'] == null) $date = "";
                                else $date = $row['date'];
                                if ($row['description'] == null) $description = "";
                                else $description = $row['description'];
                                $tachesTrouvees[] = new metier\Tache($intituleTache, $date, $description, $row['idTache']);
                        }
                        return $tachesTrouvees;
                }
                
                public function ajouterTacheAListe(int $idListe, metier\Tache $ajout){
                        $this->tacheGateway->ajouterTache($ajout, $idListe);
                }
                
                public function delTache(int $idTache){
                        $this->tacheGateway->supprimerTache($idTache);
                }
        
        }
