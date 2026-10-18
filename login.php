
<?php
require_once __DIR__ . "/config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $identifiant = trim($_POST["identifiant"] ?? "");
    $motDePasse = $_POST["mot_de_passe"] ?? "";

    if ($identifiant === "" || $motDePasse === "") {
        $message = "Veuillez remplir tous les champs.";
    } else {
        $message = "Formulaire reçu pour : " .
            htmlspecialchars($identifiant) .
            ". Aucun système de vérification n'est configuré.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - <?= htmlspecialchars(NOM_APPLICATION) ?></title>
</head>
<body>

<?php
require_once __DIR__ . "/includes/entete_inc.php";
include __DIR__ . "/includes/menu_inc.php";
?>

<h2>Connexion</h2>

<?php if ($message !== ""): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form method="post" action="login.php">
    <label for="identifiant">Identifiant :</label>
    <input type="text" id="identifiant" name="identifiant" required>

    <br><br>

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required>

    <br><br>

    <button type="submit">Se connecter</button>
</form>

<?php include __DIR__ . "/includes/pied_inc.php"; ?>

</body>
</html>
