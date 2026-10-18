
<?php
$notes = [12, 15, 9, 17, 14];

echo "Liste des notes :<br>";

foreach ($notes as $note) {
    echo $note . "<br>";
}

$moyenne = array_sum($notes) / count($notes);

echo "Moyenne : " . $moyenne . "<br>";

sort($notes);

echo "Notes triées :<br>";

foreach ($notes as $note) {
    echo $note . "<br>";
}
?>
