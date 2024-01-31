<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Connexion avec PDO</h1>
    <?php
    $a = 5;
    $db = new PDO("mysql:host=localhost;port=3307;dbname=listepays;charset=utf8mb4;",
    "root",
    "",);
    $firstQuery = $db->query("SELECT * FROM countries;");

    echo "<h3>Il y a ".$firstQuery->rowCount()."pays dans la table de countries</h3>";

    $resultFirstQuery = $firstQuery->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultFirstQuery as $item){
        echo $item['nom'],",";
    }

    var_dump($db,$firstQuery,$resultFirstQuery);
    //fermeture bonne pratique
    $db = null;
    ?>
</body>
</html>