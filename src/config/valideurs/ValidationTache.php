<?php
        class ValidationTache {
                
                /**
                 * retourne vrai si aucun soucis n'est survenu lors de la vérification, false sinon
                 */
                public static function validerCreationTache(int $idTache, string $intituleTache, string $auteur, string $dateTache, string $description) : bool {
                        
                        if(!isset($idTache) || !($idTache = filter_var($idTache, FILTER_VALIDATE_INT))) {
                                $erreurs[] = "id de la tache a insérer non spécifié. La clé primaire ne peut etre null ou ne pas etre un entier";
                                return false;
                        }
                        
                        if(!isset($intituleTache)) {
                                $erreurs[] = "intitulé de la tache a insérer non spécifié. Une tache a nécessairement besoin d'un intitulé";
                                return false;
                        }
                        if(!($intituleTache = filter_var($intituleTache, FILTER_SANITIZE_STRING))) {
                                $erreurs[] = "l'intitulé n'est pas valide, tentative possible d'injection SQL";
                                return false;
                        }
                        
                        // voir si l'auteur est bien présent dans la BDD
                }
        }
