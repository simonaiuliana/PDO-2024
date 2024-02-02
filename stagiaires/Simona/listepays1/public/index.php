<?php
/*
** front controller
*/

//chargement de dependance
//on utilise 'require_' car on veut arreter la  script en cas d'erreur; et le '_once' car le fichier contient des constantes, on ne peut en aucun cas les definir
require_once("../config.php");

// on vais se connecter a la  base des dones en utilisant pdo
//on instancie les objets en utilisant 'new' , si on doit passer des arguments aux parametres, on les mets dans les ().
//une methode est appelée lorsu'on utilise new:
// PDO::__construct(param1,param2,..)
$PDOConnect =new PDO(MY_DB_DRIVER.":host=".MY_DB_HOST.";port=".MY_DB_PORT.";dbname=".MY_DB_NAME.";charset=".MY_DB_CHARSET,MY_DB_LOGIN,MY_DB_PASS);
// creation de la requete dans une variable locale
$sql = "SELECT * FROM countries";

// execution reelle de la requete, on utilise ->query()uniquement pour 
$query = $PDOConnect->query($sql);

//on vais compter les nombres de lignes affectées par la requete query en utilisant la methode->rowCount()
$nbPays = $query->rowCount();

//on vais charge la vue pour afficher toutes les pays recuperes par la requete $query
include_once "../view/homepage.view.php";
//remetre le curseur a 0 pour reutiliser la requete(inutile pour mysql et MariaDb)
$query->closeCursor();
//on ferme la connection(portabilite de code)
$PDOConnect = null;


//var_dump($PDOConnect,$sql,$query,$nbPays);

