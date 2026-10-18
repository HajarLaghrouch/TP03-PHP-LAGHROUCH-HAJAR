
<?php
$fichier = __DIR__ . "/data/notes.csv";

if (!file_exists($fichier)) {
    exit("Aucune note à exporter.");
}

$handle = fopen($fichier, "r");

if ($handle === false) {
    exit("Impossible de lire le fichier CSV.");
}

// Préparer le téléchargement
header("Content-Type: text/csv; charset=UTF-8");
header('Content-Disposition: attachment; filename="export_notes.csv"');

// Ouvrir la sortie CSV
$sortie = fopen("php://output", "w");

// Ajouter les titres des colonnes
fputcsv($sortie, [
    "Nom",
    "Note 1",
    "Note 2",
    "Note 3",
    "Moyenne",
    "Résultat"
]);

// Copier les données
while (($ligne = fgetcsv($handle)) !== false) {
    fputcsv($sortie, $ligne);
}

fclose($handle);
fclose($sortie);
exit;
?>
