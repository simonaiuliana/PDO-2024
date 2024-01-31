<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à PDO</title>
</head>
<body>
    <h1>Connexion avec PDO</h1>
    <?php
    $a=5;
    // contient l'instanciation d'un objet de la classe PDO
    $db = new PDO("mysql:host=localhost;port=3307;dbname=listepays;charset=utf8mb4;",// type, chemin et nom de la DB
    "root", //login
    "");//mot de pass

// on sélectionne tout de la table countries -SELCT=> query
$firstQuery= $db->query("SELECT * FROM countries;");
//on va afficher le nombre d'éléments récupérés gracz à la methode rowCount()
echo"<h3> Il y a ".$firstQuery->rowCount()." pays dans la table countries </h3>";

//on doit formater les résultats pour que PHP sache comment les utliser 
//ici fetchAll crée un tableau indexé contenant les valeurs au format
// PDO::=>FETCH_ASSOC=> tableau associatif
$resultFirstQuery= $firstQuery->fetchAll(PDO::FETCH_ASSOC);

var_dump($db,$firstQuery);
    // fermature bonne pratique 


    foreach($resultFirstQuery as $item){
        echo $item['nom'].", ";    }
var_dump($db,$firstQuery,$resultFirstQuery);
$resultFirstQuery=null;
$db=null;
    ?>
    
</body>
</html>