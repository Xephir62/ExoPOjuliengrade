<?php

require_once 'Catalogue.php';
require_once 'Outil.php';
require_once 'GestionLocation.php'; 
require_once 'Client.php';
require_once 'historique.php';
require_once 'Historique.php';


function readLineInput(string $prompt): string {
    echo $prompt;
    $line = fgets(STDIN);
    if ($line === false) {
        return "";
    }
    return trim($line);
}

$catalogue = new Catalogue();
$catalogue->ajouterOutil(new Outil("Perceuse", 15.0));
$catalogue->ajouterOutil(new Outil("Ponceuse", 12.5));
$catalogue->ajouterOutil(new Outil("Tondeuse", 25.0));
$catalogue->ajouterOutil(new Outil("Marteau piqueur", 40.0));
$catalogue->ajouterOutil(new Outil("Echelle", 10.0));   


$quit = false;


while (!$quit) {
    echo "=====================================\n";
    echo "   Mini systeme de location d'outils \n";
    echo "=====================================\n";
    echo "1. Lister les outils\n";
    echo "2. Louer un outil\n";
    echo "3. Retourner un outil\n";
    echo "4. Quitter\n";

    $choiceLine = readLineInput("Votre choix : ");
    if (!ctype_digit($choiceLine)) {
        var_dump("Choix invalide.");
        continue;
    }
    $choice = (int)$choiceLine;

    if ($choice === 1) {
        echo "\nListe des outils :\n";
        $gestionLocation = new GestionLocation($catalogue);
        $gestionLocation->listerOutils();
        $quit = true;
    } elseif ($choice === 2) {
        $indexLine = readLineInput("quel outil voulez-vous louer 1,2,3,4 : ");
        $joursLine = readLineInput("Nombre de jours de location : ");
        var_dump($indexLine, $joursLine);
        if (ctype_digit($indexLine) && ctype_digit($joursLine)) {
            $index = (int)$indexLine;
            $jours = (int)$joursLine;
            $gestionLocation = new GestionLocation($catalogue);
            $prixTotal = $gestionLocation->louerOutil($index, $jours);
            if ($prixTotal !== null) {
                        var_dump($prixTotal);
            } else {
                var_dump("Louer pas ok");
            }
        } else {
            echo "Entrée invalide.\n\n";
        }
    } elseif ($choice === 3) {
        $indexLine = readLineInput("dis moi quel outil tu veux donner : ");
        if (ctype_digit($indexLine)) {
            $index = (int)$indexLine;
            $gestionLocation = new GestionLocation($catalogue);
            $success = $gestionLocation->retournerOutil($index);
            if ($success) {
                var_dump("Outil retourne avec succes.");
            } else {
                var_dump("Echec du retour. Outil peut-etre deja disponible.");
            }
        } else {
            var_dump("Entrée invalide.");
        }
    } elseif ($choice === 4) {
        $quit = true;
        var_dump("PAYEEEEEEEE");
    } else {
        var_dump("marche pas.");
    }
}