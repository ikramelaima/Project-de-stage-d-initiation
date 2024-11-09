<?php
require_once('identifier.php');
require_once('connexiondb.php');

$iddocs = isset($_GET['iddocs']) ? $_GET['iddocs'] : 0;
$requete = "SELECT * FROM doc WHERE iddocs = $iddocs";
$resultat = $pdo->query($requete);
$doc = $resultat->fetch();

if ($doc) {
    $fpdf = $doc['fpdf'];
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . basename($fpdf) . '"');
    readfile($fpdf);
} else {
    echo "Le document demandé n'existe pas.";
}
?>
