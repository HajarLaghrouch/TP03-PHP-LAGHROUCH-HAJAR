
<?php
session_start();

// Déconnecter l'utilisateur
$_SESSION = [];

session_destroy();

// Rediriger vers la page de connexion
header("Location: login.php");
exit;
?>
