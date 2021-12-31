<?php
        
        /**
         *      Le but de cette classe est d'appeler les include des classes a chaque new du code, et ne pas avoir a l'écrire a chaque fois
         */
        class Autoloader {
                public static function charger() {
                
                        if(!spl_autoload_register([self::class, '_autoload'], false)) {
                                throw new RuntimeException(sprintf('%s : Autoload non lançable', __CLASS__));
                        }
                }
                
                public static function arreter() {
                        if(!spl_autoload_unregister([self::$_instance, '_autoload'])) {
                                throw new RuntimeException('Could not stop the autoload');
                        }
                }
                
                public static function _autoload($nomClasse) {
                        
                        $folder = '..' . DIRECTORY_SEPARATOR; // dossier racine du projet
                        $nomClasse = ltrim($nomClasse, '\\'); // permet d'enlever les \ a droite du nom de la classe donnée
                        $nomFichier  = ''; // nom du fichier contenant la classe
                        $namespace = '';
                        
                        if ($lastNsPos = strripos($nomClasse, '\\')) { // recupère la position de la dernière occurence de \ dans className
                                $namespace = substr($nomClasse, 0, $lastNsPos);
                                $nomClasse = substr($nomClasse, $lastNsPos + 1);

                                // on enlève le nom de l'application du namespace, pour retrouver l'arborescence
                                $namespace = ltrim(strstr($namespace, "IllDoTomorrowCalendar"), "IllDoTomorrowCalendar");

                                $nomFichier  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
                        }
                        $nomFichier .= str_replace('_', DIRECTORY_SEPARATOR, $nomClasse) . '.php';

                        echo "$folder <br /> $nomFichier";
                        
                        include $folder . $nomFichier;
                }
        }
