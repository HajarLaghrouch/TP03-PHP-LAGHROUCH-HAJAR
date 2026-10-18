<?php
require_once __DIR__ . "/config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupérer les données
    $nom = trim($_POST["nom"] ?? "");

    $note1 = filter_input(INPUT_POST, "note1", FILTER_VALIDATE_FLOAT);
    $note2 = filter_input(INPUT_POST, "note2", FILTER_VALIDATE_FLOAT);
    $note3 = filter_input(INPUT_POST, "note3", FILTER_VALIDATE_FLOAT);

    // Vérifier les données
    if (
        $nom === "" ||
        $note1 === false || $note1 === null ||
        $note2 === false || $note2 === null ||
        $note3 === false || $note3 === null ||
        $note1 < 0 || $note1 > 20 ||
        $note2 < 0 || $note2 > 20 ||
        $note3 < 0 || $note3 > 20
    ) {
        exit("Erreur : vérifiez le nom et les notes.");
    }

    // Calculer la moyenne
    $moyenne = ($note1 + $note2 + $note3) / 3;

    // Déterminer le résultat
    if ($moyenne >= 10) {
        $resultat = "Admis";
    } else {
        $resultat = "Non admis";
    }

    // Afficher les résultats
    echo "<h1>Résultat de l'apprenant</h1>";

    echo "Nom : " . htmlspecialchars($nom) . "<br>";
    echo "Note 1 : " . $note1 . "<br>";
    echo "Note 2 : " . $note2 . "<br>";
    echo "Note 3 : " . $note3 . "<br>";

    echo "Moyenne : " . number_format($moyenne, 2) . "/20<br>";

    echo "Résultat : " . $resultat;

} else {
    echo "Veuillez remplir le formulaire.";
}
?>

    // Enregistrer les données dans un fichier CSV
    $fichier = __DIR__ . "/data/notes.csv";

    $handle = fopen($fichier, "a");

    if ($handle === false) {
        exit("Erreur : impossible d'ouvrir le fichier CSV.");
    }

    fputcsv($handle, [
        $nom,
        $note1,
        $note2,
        $note3,
        round($moyenne, 2),
        $resultat
    ]);

    fclose($handle);

    // Enregistrer les données au format JSON
    $fichierJson = __DIR__ . "/data/notes.json";

    $donnees = [];

    if (file_exists($fichierJson)) {
        $contenu = file_get_contents($fichierJson);
        $donnees = json_decode($contenu, true);

        if (!is_array($donnees)) {
            $donnees = [];
        }
    }

    $donnees[] = [
        "nom" => $nom,
        "note1" => $note1,
        "note2" => $note2,
        "note3" => $note3,
        "moyenne" => round($moyenne, 2),
        "resultat" => $resultat
    ];

    file_put_contents(
        $fichierJson,
        json_encode($donnees, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );
