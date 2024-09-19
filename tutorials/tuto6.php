<?php
// Récupération des deux nombres
echo "Entrez le premier nombre : ";
$nombre1 = intval(fgets(STDIN));

echo "Entrez le deuxième nombre : ";
$nombre2 = intval(fgets(STDIN));

// Récupération de l'opération
echo "Choisissez l'opération : 1  +
 2  -
 3  *
 4  /
";
$operation = intval(fgets(STDIN));

// Calcul en fonction de l'opération
switch ($operation) {
    case 1:
        $resultat = $nombre1 + $nombre2;
        break;
    case 2:
        $resultat = $nombre1 - $nombre2;
        break;
    case 3:
        $resultat = $nombre1 * $nombre2;
        break;
    case 4:
        if ($nombre2 == 0) {
            echo "Division par zéro impossible !\n";
        } else {
            $resultat = $nombre1 / $nombre2;
        }
        break;
    default:
        echo "Opération invalide.\n";
}

// Affichage du résultat
if (isset($resultat)) {
    echo "Le résultat est : " . $resultat . "\n";
}
