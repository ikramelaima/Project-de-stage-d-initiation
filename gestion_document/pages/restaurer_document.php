<?php
require_once('identifier.php'); // Inclure votre fichier identifier.php si nécessaire
require_once("connexiondb.php"); // Inclure votre fichier connexiondb.php si nécessaire

// Vérifier si l'ID du document à restaurer est passé en paramètre

$iddos=isset($_GET['idd'])?$_GET['idd']:0;
$requete="select * from corbeille_docs where idd=$iddos";
$resultat=$pdo->query($requete);
$docCorbeille=$resultat->fetch();


    if ($docCorbeille) {
        // Insérez le document restauré dans la table "doc"
        $requeteInsertion = "INSERT INTO doc (titre, pilote, code, support_document, mise_ajour, souscripteur, destinataires, lieu_du_classement)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $params = array(
            $docCorbeille['tit'],
            $docCorbeille['pil'],
            $docCorbeille['co'],
            $docCorbeille['support'],
            $docCorbeille['mise'],
            $docCorbeille['sous'],
            $docCorbeille['dest'],
            $docCorbeille['lieu']
        );

        $resultatInsertion = $pdo->prepare($requeteInsertion);
        $resultatInsertion->execute($params);

        // Supprimez le document restauré de la table "corbeille_docs"
        $requeteSuppression = "DELETE FROM corbeille_docs WHERE idd = ?";
        $resultatSuppression = $pdo->prepare($requeteSuppression);
        $resultatSuppression->execute([$iddos]);

        // Redirigez l'utilisateur vers la page de la corbeille après la restauration
        header('Location: documents.php');
        exit();
    }


// Si l'ID du document n'est pas valide, redirigez l'utilisateur vers une page d'erreur
header('Location: documents.php');
exit();
?>
