<?php

$toolNames = [
    "Perceuse",
    "Ponceuse",
    "Tondeuse",
    "Marteau piqueur",
    "Echelle"
];

$pricesPerDay = [
    15.0,
    12.5,
    25.0,
    40.0,
    10.0
];

$available = [
    true,
    true,
    true,
    true,
    true
];

function readLineInput(string $prompt): string {
    echo $prompt;
    $line = fgets(STDIN);
    if ($line === false) {
        return "";
    }
    return trim($line);
}

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
        echo "Choix invalide.\n\n";
        continue;
    }
    $choice = (int)$choiceLine;

    if ($choice === 1) {
        echo "\nListe des outils :\n";
        for ($i = 0; $i < count($toolNames); $i++) {
            $status = $available[$i] ? "DISPONIBLE" : "LOUE";
            echo $i . " - " . $toolNames[$i]
                . " | " . $pricesPerDay[$i] . " €/jour"
                . " | " . $status . "\n";
        }
        echo "\n";

    } elseif ($choice === 2) {
        $indexLine = readLineInput("\nEntrez l'index de l'outil a louer : ");
        if (!ctype_digit($indexLine)) {
            echo "Index invalide.\n\n";
            continue;
        }
        $index = (int)$indexLine;

        if ($index < 0 || $index >= count($toolNames)) {
            echo "Aucun outil pour cet index.\n\n";
            continue;
        }

        if ($available[$index] === false) {
            echo "Outil deja loue. Impossible de le louer a nouveau.\n\n";
            continue;
        }

        $daysLine = readLineInput("Nombre de jours de location : ");
        if (!ctype_digit($daysLine)) {
            echo "Nombre de jours invalide.\n\n";
            continue;
        }
        $days = (int)$daysLine;

        if ($days <= 0) {
            echo "Le nombre de jours doit etre strictement positif.\n\n";
            continue;
        }

        $totalPrice = $days * $pricesPerDay[$index];
        $available[$index] = false;

        echo "\n---------- Recapitulatif ----------\n";
        echo "Outil : " . $toolNames[$index] . "\n";
        echo "Duree : " . $days . " jour(s)\n";
        echo "Prix par jour : " . $pricesPerDay[$index] . " €\n";
        echo "Prix total : " . $totalPrice . " €\n";
        echo "-----------------------------------\n\n";

    } elseif ($choice === 3) {
        // Retourner un outil
        $indexLine = readLineInput("\nEntrez l'index de l'outil a retourner : ");
        if (!ctype_digit($indexLine)) {
            echo "Index invalide.\n\n";
            continue;
        }
        $index = (int)$indexLine;

        if ($index < 0 || $index >= count($toolNames)) {
            echo "Aucun outil pour cet index.\n\n";
            continue;
        }

        if ($available[$index] === true) {
            echo "Cet outil est deja marque comme disponible.\n\n";
            continue;
        }

        $available[$index] = true;
        echo "Outil " . $toolNames[$index] . " retourne. Il est maintenant disponible.\n\n";

    } elseif ($choice === 4) {
        $quit = true;
        echo "Au revoir !\n";
    } else {
        echo "Choix invalide.\n\n";
    }
}
