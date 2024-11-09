<?php
require_once('identifier.php');
require_once('connexiondb.php');

// Vérifiez si l'ID du document à supprimer est présent dans la requête GET
$iddocs=isset($_GET['iddocs'])?$_GET['iddocs']:0;
$requete="select * from doc where iddocs=$iddocs";
$resultat=$pdo->query($requete);
$doc=$resultat->fetch();

    if ($doc) {
        // Insérez le document dans la table "corbeille_docs"
        $requeteInsertion = "INSERT INTO corbeille_docs (tit, pil, co, support, mise, sous, dest, lieu)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $params = array(
            $titre=$doc['titre'],
    $pilote=$doc['pilote'],
     
    $code=$doc['code'],
     
    $support=$doc['support_document'],
     
    $mise=$doc['mise_ajour'],
     
    $fournisseur=$doc['souscripteur'],
     
    $destinataires=$doc['destinataires'],
     
    $lieu=$doc['lieu_du_classement'],

        );

        $resultatInsertion = $pdo->prepare($requeteInsertion);
        $resultatInsertion->execute($params);

        // Supprimez le document de la table "doc"
        $requeteSuppression = "DELETE FROM doc WHERE iddocs = ?";
        $resultatSuppression = $pdo->prepare($requeteSuppression);
        $resultatSuppression->execute([$iddocs]);

        // Redirigez l'utilisateur vers la page documents.php après la suppression
        header('Location: documents.php');
        exit();
    }


// Si l'ID du document n'est pas valide, redirigez l'utilisateur vers une page d'erreur
header('Location: erreur.php');
exit();
?>
