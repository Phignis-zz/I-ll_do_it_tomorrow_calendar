<?php

        namespace IllDoTomorrowCalendar\Config;
        
        /**
         *      Le but de cette classe est d'appeler les include des classes a chaque new du code, et ne pas avoir a l'écrire a chaque fois
         */
        class Autoloader {
                public static function charger() {
                
                        if(!spl_autoload_register([self::class, '_autoload'], false)) {
                                throw new RuntimeException(sprintf('%s : Autoload non lançable', __CLASS__);
                        }
                }
                
                public static function arreter() {
                        if(!spl_autoload_unregister([self::$_instance, '_autoload'])) {
                                throw new RuntimeException('Could not stop the autoload');
                        }
                }
                
                public static function _autoload($nomClasse) {
                        
                        $folder = './'; // dossier où se trouve la classe
                        $nomClasse = ltrim($nomClasse, '\\'); // permet d'enlever les \ a droite du nom de la classe donnée
                        $nomFichier  = ''; // nom du fichier contenant la classe
                        $namespace = '';
                        
                        if ($lastNsPos = strripos($nomClasse, '\\')) { // recupère la dernière occurence de \ dans className
                                $namespace = substr($nomClasse, 0, $lastNsPos);
                                $nomClasse = substr($nomClasse, $lastNsPos + 1);
                                $nomFichier  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
                        }
                        $nomFichier .= str_replace('_', DIRECTORY_SEPARATOR, $nomClasse) . '.php';
                        
                        include $folder . $nomFichier;
                }
        }
