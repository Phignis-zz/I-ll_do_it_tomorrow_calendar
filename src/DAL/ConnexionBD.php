<?php

        namespace IllDoTomorrowCalendar\DAL;

        class ConnexionBD extends PDO {
                
                private $statement = NULL;
                
                private static $singleton;
                
                private function __construct(string $nomSourceDonnee, string $utilisateur, string $motDePasse) {
                        
                        parent::__construct($nomSourceDonnee, $utilisateur, $motDePasse);
                        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                
                private static function getInstance(string $nomSourceDonnee, string $utilisateur, string $motDePasse) : ConnexionBD {
                        
                        if($singleton == NULL) $singleton = new ConnexionBD($nomSourceDonnee, $utilisateur, $motDePasse);
                        
                        return $singleton;
                }
                
                public function executerQuery(string $query, array $parametres = []) : bool {
                        
                        // préparation de la commande SQL
                        $this->$statement = parent::prepare($query);
                        
                        
                        // binding des paramètres à la commande
                        foreach($parametres as $nomParametreRequete => $valeurParametreRequete) {
                                // valeurParametreRequete est un tableau contenant la valeur, et son type PDO
                                $this->statement->bindValue($nomParametreRequete, $valeurParametreRequete[0], $valeurParametreRequete[1]);
                        }
                        
                        // true si succès de la commande, false sinon
                        return $this->statement->execute();
                }
                
                public function recupererResultatQuery() : array {
                        
                        return $this->statement->fetchall(PDO::FETCH_ASSOC); /* PDO::FETCH_ASSOC permet de ne récuperer les données que via la nom de colonne,
                        en abandonnant l'accès via index, qui génererait un doublon retourné pour chaque tuple */
                }
        }
