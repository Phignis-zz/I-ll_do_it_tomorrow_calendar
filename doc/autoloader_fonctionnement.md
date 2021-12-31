# Fonctionnement de l'autoloader

## Explication préalable sur les namespaces
>
> En php, on peut déclarer ce que l'on appelle des namespaces. Par défaut, le namespace est vide.
> Lorsque l'on déclare un namespace à une classe, on doit spécifier son namespace.
> Par exemple, sans namespace, si j'ai ma classe FrontController qui se trouve au namespace `IllDoItTomorrowCalendar\config`,
> je require d'abord le fichier selon son arborescence par rapport au premier fichier lancé (normalement toujours index.php), puis pour 
> faire un new, nous devons spécifier aussi son package: `new IllDoItTomorrowCalendar\config\FrontController();`

> Cependant, si le code où l'on effectue le new se trouve dans le même namespace, on n'est plus obligé de préciser son namespace à
> l'appel du constructeur: `new FrontController();`. Malgré tout, il faudra toujours require le fichier avec son arborescence tout de
> même.

> Afin de ne plus avoir à effectuer les requires de classes (les requires et include de vues seront toujours à faire), la classe
> (Autoloader)[../src/config/Autoloader.php] a été mise en place.
>

## Fonctionnement du Autoloader
>
> L'autoloader a pour but d'effectuer a la place de l'informaticien le require ou include du fichier contenant cette classe.
> Son action prends place a chaque new, une fois qu'il est activé.
> Pour activer son action, on effectue la méthode (spl_autoload_register)[https://www.php.net/manual/fr/function.spl-autoload-register.php], qui permet d'enregistrer une fonction X comme __autoload(), fonction appelée a chaque new.
> On lui donne l'instance (ou classe si méthode statique), et la fonction a enregistrer comme autoload(), qui sera donc appelé.
>
>
> L'autoloader mis en place lors de ce projet est un autoloader fonctionnant avec la norme (PSR-4)[https://www.php-fig.org/psr/psr-4/].
> Les namespaces mis en place possède en premier le nom de premier niveau `IllDoTomorrowCalendar\`. Il est suivi de l'arborescence
> depuis src/ (sensible à la casse) vers le dossier contenant ce fichier de classe. L'autoloader effectue un include, en prenant le
> namespace, en enlevant le nom de premier niveau.
> Cela explique pourquoi chaque sous-namespace se réfère à l'arborescence physique du projet.
>