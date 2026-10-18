
<?php
require_once __DIR__ . "/config.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(NOM_APPLICATION) ?></title>
</head>
<body>

<?php
require_once __DIR__ . "/includes/entete_inc.php";
include __DIR__ . "/includes/menu_inc.php";
?>

<h2>Liste des apprenants</h2>

<?php
$fichier = __DIR__ . "/data/notes.csv";

if (!file_exists($fichier)) {
    echo "<p>Aucune note enregistrée pour le moment.</p>";
} else {
    $handle = fopen($fichier, "r");

    if ($handle === false) {
        echo "<p>Erreur lors de la lecture du fichier.</p>";
    } else {
        echo "<table border='1' cellpadding='8'>";
        echo "<tr>
                <th>Nom</th>
                <th>Note 1</th>
                <th>Note 2</th>
                <th>Note 3</th>
                <th>Moyenne</th>
                <th>Résultat</th>
              </tr>";

        while (($ligne = fgetcsv($handle)) !== false) {
            if (count($ligne) < 6) {
                continue;
            }

            echo "<tr>";

            foreach ($ligne as $valeur) {
                echo "<td>" . htmlspecialchars((string)$valeur) . "</td>";
            }

            echo "</tr>";
        }

        echo "</table>";
        fclose($handle);
    }
}
?>

<?php
include __DIR__ . "/includes/pied_inc.php";
?>

</body>
</html>
