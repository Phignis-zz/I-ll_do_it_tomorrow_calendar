# Conventions du projet

Les conventions permettent une relecture, des recherches, et une maintenance de code facilitées.
Afin d'assurer le bon développement du projet, quelques conventions sont a suivre:

1.  Conventions sur les fichiers
> *   Chaque fichier PHP de classe ne devra posséder qu'une seule classe, afin de faciliter la recherche
> *   Chaque fichier PHP de classe devra être nommé avec le nom de la classe (case_sensitive), suivi d'un underscore (tiret bas) et de la terminaison classe.php
>     Ainsi un fichier contenant la classe MyClass devra être nommé MyClass_classe.php

2. Conventions sur le nommage global
> *   De part la nature du projet, développé en IUT Informatique, la langue française est à préférer pour le nommage de variables, classes ou fichier.
> *   En général, le kamelCase est à préférer au snake_case pour le nommage

3. Conventions sur le formatage du code
> *   Les accolades (curly bracket) indiquant les blocs de code doivent suivre la convention "Kernighan & Ritchie Style" :
>     ex:      `public myFonction(myParameters) {
                        // your code here
                }`
