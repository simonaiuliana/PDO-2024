# PDO-2024
Cours PHP:  PDO - MySQL - MariaDB

## PDO : Présentation

PDO est l'acronyme de PHP Data Objects. C'est une extension PHP qui définit une interface pour accéder à une base de données depuis PHP. Cette extension présente l'avantage de supporter de nombreux SGBD (MySQL, PostgreSQL, Oracle, etc.) en utilisant une unique interface. 

PDO est disponible depuis PHP 5.1.* . Il est recommandé d'utiliser PDO pour accéder à une base de données en `MySQL` ou `MariaDB`. En effet, l'extension `mysql_` est obsolète depuis PHP 5.5.0 et sera supprimée dans une version future de PHP. L'extension `mysqli_` est une alternative procédurale et/ou orienté objet à mysql_, mais PDO est plus simple à utiliser.

## PDO : Installation

PDO est une extension de PHP, il faut donc l'installer et l'activer pour pouvoir l'utiliser. Pour cela, il faut modifier le fichier php.ini de votre serveur. Il faut rechercher la ligne suivante :

```ini
;extension=php_pdo_mysql.dll
```

et la décommenter en supprimant le point-virgule :

```ini
extension=php_pdo_mysql.dll
```

PDO est généralement installé par défaut avec PHP.

## PDO : Connexion à la base de données

```php
