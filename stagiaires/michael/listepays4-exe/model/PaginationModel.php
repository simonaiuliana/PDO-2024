<?php

require_once "../config.php"; // constantes

// fonction utilisateur de pagination au format texte
function PaginationModel(string $url, // url (pour garder les autres variables get)
                        string $getName, // le nom de notre variable get de pagination
                        int $nbTotalItem, // le nombre total d'item à afficher
                        int $currentPage=1,  // la page actuelle
                        int $nbByPage=10 // la nombre d'item par page
                        ): string|null 
{
    // pas d'item, pas de pagination
    if($nbTotalItem===0) return null;
    // création de la variable de sortie au format texte
    $sortie="";
    // on calcule le nombre de page en divisant le nombre
    // total d'item par le nombre d'item par page
    // le tout arrondit à l'entier supérieur ceil
    $nbPage = (int) ceil($nbTotalItem/$nbByPage);

    // si une seule page, pas de pagination
    if($nbPage<2) return null;

    // on commence par le bouton précédent, utilisation d'une ternaire pour remplacer un il et else
    $sortie.= $currentPage===1
                ? "<< <"
                : "<a href='$url'><<</a> <a href='$url?&$getName=".($currentPage-1)."'><</a>";

    // on termine par le bouton suivant
    $sortie.= $currentPage === $nbPage ? "> >>" : "<a href='$url?&$getName=".($currentPage+1)."'>></a> <a href='$url?&$getName=$nbPage'>>></a>";

    return $sortie;
}

if(isset($_GET["pg"])) $page = (int) $_GET["pg"];
else $page = 1;

$viewPage = PaginationModel("PaginationModel.php", MY_PAGINATION_GET, 340,$page,MY_PAGINATION_BY_PAGE);

echo $viewPage;

var_dump($_GET);