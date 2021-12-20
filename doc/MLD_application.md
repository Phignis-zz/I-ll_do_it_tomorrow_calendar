# MLD de l'application:

# Signification d'écriture spéciales dans le MLD:
>
> Un attribut de table écris **en gras** signifie que cet attribut est membre de la clé primaire de cette dite table.
> Un attribut de table écris *en italique* et précédé d'un `#` signifie que cet attribut est une clé étrangère, référençant une autre table.
>

# Modélisation Logique des Données:
>
> UTILISATEUR(**pseudo**, email, dateNaissance, password)
>
> LISTETACHE(**idListe**, nomListe, #*pseudoProprietaire*)
>
> TACHE(**idTache**, intituleTache, date, description, #*idListe*)
>

# Spécification tant qu'aux clés étrangères:
>
> Chaque tuple (ou ligne) de TACHE possède une clé étrangère #*idListe*, référençant LISTETACHE. Cette clé étrangère ne peut être NULL, car une tache appartient
> forcément à une liste de tâche.
>
> Chaque tuple de LISTETACHE possède une clé étrangère #*pseudoProprietaire*, référençant UTILISATEUR. Cette clé étrangère peut être NULL.
> Si jamais cette clé est NULL, cela signifie que la liste est publique, et accessible à n'importe qui.
>

# Explication et limite de cette conception:
>
> ##### Explications: 
> > Chaque tâche, selon le (sujet donné dans la section "Consigne encadrant le projet")[../README.md], doit appartenir à une liste de tâche, expliquant que la clé
> > étrangère de TACHE référençant LISTETACHE ne peut être NULL. Chaque tache est identifié par un id unique, afin d'autoriser le fait d'avoir plusieurs taches
> > de même intitulé dans la même liste de tâche.
> >
> > Chaque utilisateur est identifié par un pseudo. Le password devrait idéalement être stocké encrypté dans la base de donnée, pour un soucis de sécurité.
> >
> > Chaque liste de tache est identifiée par un id, car on souhaite pouvoir avoir le même intitulé de liste chez différents comptes.
>
> ##### Limites de la conception:
> >
> > 1.  Actuellement, on ne peut avoir une tâche privée avec plus d'une personne possédant cette tâche. Pour résoudre en partie cela,
> >
> >     (il suffit de rendre la cardinalité)[MCD_application.pdf] entre LISTETACHE et UTILISATEUR de 0:1 à 0:N.
> >     Cela génèrerait une nouvelle table, POSSEDERLISTE, avec un couple clé étrangère et à la fois clé primaire sur UTILISATEUR et LISTETACHE.
> >
> >     Cependant, cela pose toujours un soucis pour les droits, car tout utilisateur accédant à la liste est considéré comme le créateur.
> >
> >     On peut complexifier en deux relations entre LISTETACHE et UTILISATEUR, accéder, et posséder.
> >
> > 2.  Bien que l'on puisse enregistrer deux fois le même nom de liste dans deux comptes différents, on peut aussi enregistrer deux fois sur un même compte le même
> >     nom de liste. Cela ne nous pose pas un soucis dans notre cas, mais pour d'autres projets, cela pourrait en poser un.
> >     On ne peut rendre membre de clé primaire la clé étrangère #*pseudoProprietaire*, car cette dernière peut être NULL.
> >
> >     En prenant en compte les changements mis en place au point 1., on peut imaginer un utilisateur "public", servant juste a pouvoir rendre
> >     la cardinalité de l'association hiérarchique faible 0:1 de LISTETACHE à UTILISATEUR en une cardinalité forte 1:1, assurant à pseudoProprietaire
> >     d'être NOT NULL, et donc de pouvoir la rendre membre de la clé primaire.
> >     Cette solution n'est peut etre tout de même pas la solution optimale.
> >
> > Trouver le MCD résultant de la correction des limites (ici)[MCD_ideal_application.pdf]. Ce MCD ne sera pas mis en place à l'issue du rendu du projet, mais 
> > pourrait être mis en place dans le futur. 
>

# Modélisation idéale:
>
> UTILISATEUR(**pseudo**, email, dateNaissance, password)
>
> LISTETACHE(**idListe**, nomListe, #***pseudoProprietaire***)
>
> ACCEDER(#***pseudoAccesseur***, #***idListeAccedee***)
>
> TACHE(**idTache**, intituleTache, date, description, #*idListe*)
>
