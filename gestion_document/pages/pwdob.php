/*<?php
require_once("connexiondb.php");
$email = isset($_POST['email']) ? $_POST['email'] : "";
$iduser = 1; // L'ID de l'utilisateur dont vous souhaitez mettre à jour le mot de passe
$newpwd = "0000"; // Nouveau mot de passe

// Vous devriez utiliser des guillemets simples pour entourer les chaînes de caractères dans la requête SQL.
$requete = "UPDATE utilisateurs SET mode_passe = ? WHERE email = ?";

$resultat = $pdo->prepare($requete);
$resultat->execute([$newpwd, $email]);

// Redirigez l'utilisateur vers la page de connexion
header("Location: Félicitation.php");
// Assurez-vous de terminer le script ici pour éviter toute exécution ultérieure
?>
//