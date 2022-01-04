<?php

        namespace IllDoTomorrowCalendar\config\valideurs;
        
        class ValidateurGenerique {
                /**
                 * validerStr:
                 * vérifie que la chaîne donnée en paramètre est bien une chaîne de caractère.
                 * paramètres:
                 *      chaine : la chaine a vérifier
                 * return:
                 *      Un boolean.
                 * 		True: paramètre vérifié
                 * 		False: paramètre invalide
                 */
                
                public static function validerStr(string $chaine) : string {
                    if($chaine = filter_var($chaine, FILTER_SANITIZE_STRING)) return $chaine;
					return "INVALIDATE";
                }
                
                /**
                 * validerInt:
                 * vérifie que la valeur donnée en paramètre est bien un entier.
                 * paramètres:
                 *      val : valeur a vérifier
                 * return:
                 *      Un boolean.
                 * 		True: paramètre vérifié
                 * 		False: paramètre invalide
                 */
                public static function validerInt(int $val) : bool {
                    if($val = filter_var($val, FILTER_VALIDATE_INT)) return true;
                    return false;
                }
                
                /**
                 * estExistante:
                 * vérifie que la valeur donnée en paramètre existe bien.
                 * paramètres:
                 *      val : valeur a vérifier
                 * return:
                 *      Un boolean.
                 * 		True: paramètre vérifié
                 * 		False: paramètre invalide
                 */
                public static function estExistante($val) : bool {
                    if (isset($val)) return true;
                    return false;
                }
                
                /**
                 * filtrerDate:
                 * vérifie que la date donnée en paramètre est valide, et la purifie
                 * paramètres:
                 *      chaine : valeur a filtrer
                 * return:
                 *      Un string, soit le string tel que donné (DD/MM/YYYY DD/MM/YY), soit la date 01/01/1970
                 */
                public static function filtrerDate(string $chaine) : string {
                    $chaine = rtrim(ltrim($chaine)); // j'enlève tout les espaces potentiels

                    if(strlen($chaine) == 8 || strlen($chaine) == 10) { // date valide si au format 14/12/2021 ou 12/12/02
                        if(\DateTime::createFromFormat('d/m/Y', $chaine) !== false || \DateTime::createFromFormat('d/m/y', $chaine) !== false) {
                            // date valide
                            return $chaine;
                        }
                        else {
                            return "01/01/1970";
                        }
                    } else {
                        return "01/01/1970";
                    }
                }

                public static function validerEmail(string $email) : string {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)) return $email;
					return "INVALIDE";
                }
        }
