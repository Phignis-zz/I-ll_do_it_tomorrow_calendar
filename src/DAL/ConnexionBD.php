<?php

        namespace IllDoTomorrowCalendar\DAL;

        class ConnexionBD extends \PDO {
                
                private $statement = NULL;
                
                private static $singleton = NULL;
                
                private function __construct(string $nomSourceDonnee, string $utilisateur, string $motDePasse) {
                        try {
                                // a ce niveau, peut throw une PDOException car mauvais crédits pour se login
                                parent::__construct($nomSourceDonnee, $utilisateur, $motDePasse);
                                $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                        } catch (\PDOException $p) {
                                throw new \Exception("les informations pour se connecter à la base de donnée sont erronées.");
                                // ValueError meilleur pour le sens, mais on code en PHP 7
                        }
                }
                
                public static function getInstance(string $nomSourceDonnee, string $utilisateur, string $motDePasse) : ConnexionBD {
                        if(is_null(self::$singleton)) self::$singleton = new ConnexionBD($nomSourceDonnee, $utilisateur, $motDePasse);
                        
                        return self::$singleton;
                }
                
                public function executerQuery(string $query, array $parametres = []) : bool {
                        
                        // préparation de la commande SQL
                        $this->statement = parent::prepare($query);
                        
                        
                        // binding des paramètres à la commande
                        foreach($parametres as $nomParametreRequete => $valeurParametreRequete) {
                                // valeurParametreRequete est un tableau contenant la valeur, et son type PDO
                                $this->statement->bindValue($nomParametreRequete, $valeurParametreRequete[0], $valeurParametreRequete[1]);
                        }
                        
                        // true si succès de la commande, false sinon
                        try {
                                return $this->statement->execute();
                        } catch (\PDOException $p) {
                                throw new \Exception("Etat des arguments de la querry à executer illégal");
                        }
                        
                }
                
                public function recupererResultatQuery() : array {
                        
                        return $this->statement->fetchall(\PDO::FETCH_ASSOC); /* PDO::FETCH_ASSOC permet de ne récuperer les données que via la nom de colonne,
                        en abandonnant l'accès via index, qui génererait un doublon retourné pour chaque tuple */
                }
        }
