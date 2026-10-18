
<?php

// Nom de l'application
const NOM_APPLICATION = "Suivi des notes des apprenants";

// Notes minimale et maximale
const NOTE_MIN = 0;
const NOTE_MAX = 20;

// Moyenne nécessaire pour réussir
define("MOYENNE_ADMISSION", 10);

// Vérifier si la constante existe
if (defined("MOYENNE_ADMISSION")) {
    echo "La constante MOYENNE_ADMISSION existe.";
}

?>
