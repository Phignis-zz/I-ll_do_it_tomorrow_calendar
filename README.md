# The "I ll do it tomorrow Calendar"

## Contexte du projet
> Lors du semestre 3 de DUT Informatique (1er semestre de 2ème année), et dans le cadre du cours de `Programmation Web côté Serveur`, trois intitulés de projets, ayant pour but de mobiliser les connaissances acquises lors du cours en PHP, nous ont été proposé.
> Chaque projet demande nottament de mettre en place le patron d'architecture MVC (modele view controller)
>
> Nous avons choisi de faire une ToDo List.

## Premier lancement

> Assurez vous d'avoir lancé un serveur pour executer le PHP, et d'avoir une BDD MySQL.

> Le script de création des tables se trouve [ici](./src/database/ill_do_it_tomorrow.sql).
> Cela est à import sur votre serveur même, il créé un utilisateur admin, avec mot de passe admin&63, ainsi qu'une base de donnée nommée 'ill_do_it_tomorrow'.
> Cet utilisateur possède tout les droits sur la base de donnée créé (y compris GRANT).

> Alternativement, vous avez le fichier [suivant](./src/database/ill_do_it_tomorrow_only_database_structure_datas.sql). Celui ci ne génère ni database, ni utilisateur,
> mais uniquement la structure des tables, et les tuples d'exemples. Cependant, il faudra créer soit même la base et l'utilisateur, et potentiellement changer
> les accréditations présentes dans [config.php](./src/config/config.php).

## Consigne encadrant le projet
> ###### Projet A: ToDo List
>>
>> Pour ce projet, il s’agit d’une simple application de listes de tâches.
>>
>>
>> Pour cette application il y aura deux acteurs : les visiteurs (non connectés) et les utilisateurs (connectés).
>>
>> La seule différence entre ces deux acteurs se trouvera au niveau de leurs listes de tâches, en effet, les utilisateurs connectés
>> pourront créer des listes de tâches qui seront privées et qu’eux seuls pourront voir. En revanche les visiteurs ont seulement
>> accès à des listes de tâches publiques.
>> 
>> Chaque liste et chaque tâche doit être sauvegardée en base de données (pensez à la relation entre les deux). Voici le
>> fonctionnement de l’application :
>>
>>
>> *   Le visiteur peut voir/ajouter/supprimer des listes et des tâches publiques sans se connecter.
>> *   Il faut créer un espace pour se connecter à l’application (si vous avez du temps, faire une partie inscription également).
>> *   Une fois l’utilisateur connecté, il a accès aux listes publiques (comme le visiteur), mais également à ses listes privées. >> *   Toutes les listes de tâches ajoutées par un utilisateur sont privées par défaut afin de simplifier l’application.
>>     Il peut bien entendu supprimer ses listes également. Il faut penser à la relation entre les listes de tâches et l’utilisateur en base de données.
>> *   Chaque tâche pourra être complétée via une case à cocher, ajoutez un bouton pour valider en dessous de la liste des tâches.
>> *   Pour les plus téméraires, essayez de compléter/dé-compléter des tâches via des requêtes AJAX à la place du bouton valider (optionnel).
>> La gestion des droits doit être complète, un visiteur ne doit pas pouvoir accéder aux listes des utilisateurs ou les supprimer, idem pour la complétion des tâches.
>> 
>> En général dans une application de gestion de tâches, les tâches complétées sont barrées afin d’être distinguées des tâches restantes.
>> Cela est faisable via CSS pur (i.e. : la page n’a pas besoin d’être actualisée, et l’utilisation de JavaScript n’est pas requise)

## Membres du groupe

> DUBOIS Mïckael
>
> FOUCRAS Baptiste

## Technologies utilisées
> *   HTML 5
> *   CSS 3
> *   PHP 7
> *   PHPMyAdmin (et PDO) pour les manipulations de base de donnée
> *   Wamp Server 3.2.3, avec une base de donnée MySQL 5.7.31, PHP 7.3.21 et PHPMyAdmin 5.0.2 a été utilisé lors du développement du projet

## Arborescence du projet
> *   [doc](./doc) : dossier contenant toute la documentation du projet (diagramme de conception, sketchs...)
> *   [src](./src) : dossier contenant tout le code source du projet du site
> *   [src/config](src/config) : dossier contenant tout le code php permettant de définir des variables utiles a tout le site (le chemin vers toutes les images, ls CSS...),
>     mais aussi les valideurs et l'autoloader
> *   [src/controlleurs](src/controlleurs) : dossier contenant tout les controlleurs (servant au controle de la validité des données saisies, redirections sur les vues
>     adéquates...)
> *   [src/DAL](src/DAL) : dossier contenant la Data Access Layout, donc toutes les Gateways demandant directement à la classe [connexionBD](src/DAL/ConnexionBD.php)
> *   [src/modeles](src/modeles) : dossier contenant tout les modèles du projet (manipulant les données métiers, tel des Gateway), ainsi que le sous dossier métier
> *   [src/ressources](src/ressources) : dossier contenant tout les ressources de l'application (images, fichiers CSS3, parties html communes tel le header ou le footer)
> *   [src/vues](src/vues) : dossier contenant toutes les vues de l'application (contenu html visible directement par l'utilisateur, généré avec les données demandées aux
>     controllers)
> *   [src/database](src/database) : dossier contenant les fichiers sql générant la base de donnée de l'application

## Conventions

> veuillez vous référer au fichier [convention.md](./doc/convention.md) pour connaître les conventions régissant le développement du projet.
