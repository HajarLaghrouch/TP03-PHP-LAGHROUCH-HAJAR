
<?php
$note = 15;

if ($note >= 16) {
    echo "Très bien";
} elseif ($note >= 14) {
    echo "Bien";
} elseif ($note >= 12) {
    echo "Assez bien";
} elseif ($note >= 10) {
    echo "Passable";
} else {
    echo "Non admis";
}

echo "<br>";

// Boucle for
for ($i = 1; $i <= 5; $i++) {
    echo "Note numéro " . $i . "<br>";
}
?>
