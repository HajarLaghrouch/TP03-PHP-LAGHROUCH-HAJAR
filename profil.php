
<?php
require_once __DIR__ . "/config.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - <?= htmlspecialchars(NOM_APPLICATION) ?></title>
</head>
<body>

<?php
require_once __DIR__ . "/includes/entete_inc.php";
include __DIR__ . "/includes/menu_inc.php";
?>

<h2>Profil de l'apprenant</h2>

<?php
if (isset($_GET["nom"]) && trim($_GET["nom"]) !== "") {
    $nom = trim($_GET["nom"]);
    echo "<p>Nom : " . htmlspecialchars($nom) . "</p>";
} else {
    echo "<p>Aucun nom fourni.</p>";
}
?>

<?php include __DIR__ . "/includes/pied_inc.php"; ?>

</body>
</html>
