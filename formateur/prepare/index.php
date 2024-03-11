<?php

require_once "config.php";
require_once "PDOConnect.php";


/*
Requêtes préparées :
- protection contre les injections SQL
- mise en cache de la requête
- réutilisation multiple de la requête
*/

if(isset($_POST['num1'],$_POST['num2'])):

// Préparation de notre requête avec prepare et les marqueurs ?
$request = $PDOConnect->prepare("SELECT `nom`, `population` FROM `countries` WHERE `population` BETWEEN ? AND ? ORDER BY `population` DESC ;");

// utilisation de bindValue(), version plus longue mais plus stricte que le tableau dans l'execute(). 1 représente le premier ? dans l'ordre de lecture (de haut en bas gauche à droite)
$request->bindValue(1,$_POST['num1'],PDO::PARAM_INT);
$request->bindValue(2,$_POST['num2'],PDO::PARAM_INT);

try{
    $request->execute();
}catch(Exception $e){
    die($e->getMessage());
}
$resultat = $request->fetchAll();

endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prepare</title>
</head>
<body>
    <h1>Prepare</h1>
    <h2>bindValue</h2>
    <h3>Avec des marqueurs ?</h3>
    <h4>Choisissez le nombre d'habitants entre 2 nombres</h4>
    <p>Pour afficher les pays qui ont ce nombre d'habitants</p>
    <form action="" method="POST" name="marqueur">
        <input type="number" name="num1" value="1000000" max="10000000" step="100000"> à <input type="number" name="num2" value="10000000" min="10000000" step="100000"> <input type="submit" value="rechercher">
    </form>
    <?php
    if(isset($resultat)):
    ?>
    <h3>Pays ayant entre <?=number_format((int)$_POST['num1'], 0, '.', ' ');?> et <?=number_format((int)$_POST['num2'], 0, '.', ' ');?> habitants : <?=count($resultat)?></h3>
    <?php
        foreach($resultat as $item):
            ?>
        <p><?=$item['nom']?> | <?=number_format($item['population'],0,'.',' ')?> habitants</p>
            <?php
        endforeach;
    endif;
    ?>
</body>
</html>