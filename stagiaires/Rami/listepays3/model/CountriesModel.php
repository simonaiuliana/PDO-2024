<?php

// création d'une fonction qui récupère tous les pays dans la db listepays, elle a besoin d'une connexion PDO pour fonctionner, si indique PDO devant le paramètre, on ne peut qu'accepter un objet de type PDO.
// Cette fonction va nous renvoyer un array
function getAllCountries(PDO $connectDB): array
{
    $sql = "SELECT * FROM countries"; // requête non exécutée
    $query = $connectDB->query($sql); // exécution de la requête de type SELECT avec query()
    $datas = $query->fetchAll();
    // bonne pratique (autres DB que MySQL ou MariaDB)
    $query->closeCursor();
    // envoie du tableau indexé contenant les pays
    return $datas;
}

