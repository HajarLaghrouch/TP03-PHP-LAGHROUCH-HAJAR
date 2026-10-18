
<?php
// 1. Affichage
echo "Suivi des notes des apprenants";
echo "<br>";

// 2. Variables
$nom = "Sara";
$note = 16;
$moyenne = 14.5;
$admis = true;

// 3. Constantes
const ECOLE = "Centre de formation";
define("ANNEE", 2026);

// 4. Affichage des informations
echo "Nom : " . $nom . "<br>";
echo "Note : " . $note . "<br>";
echo "Moyenne : " . $moyenne . "<br>";
echo "École : " . ECOLE . "<br>";
echo "Année : " . ANNEE . "<br>";

// 5. Condition
if ($note >= 10) {
    echo "Résultat : Admis";
} else {
    echo "Résultat : Non admis";
}
?>
