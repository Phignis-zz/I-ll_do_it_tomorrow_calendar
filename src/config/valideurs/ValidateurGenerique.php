<?php
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
					return null;
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
				
				//utiliser DateTime (createFromFormat)
        }
