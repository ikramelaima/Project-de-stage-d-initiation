<?php
require_once('identifier.php');
require_once("connexiondb.php");

// Sélectionnez tous les documents de la corbeille (adapté à votre structure de base de données)
$requeteCorbeille = "SELECT * FROM corbeille_docs";
$resultCorbeille = $pdo->query($requeteCorbeille);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corbeille</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
</head>
<body>
    <?php include("menu.php"); ?>

    <div class="container">
        <h1>Corbeille des Documents</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Pilote</th>
                    <th>Code</th>
                    <th>Support_document</th>
                    <th>Mise à jour</th>
                    <th>Souscripteur</th>
                    <th>Destinataires</th>
                    <th>Lieu du classement</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($docCorbeille = $resultCorbeille->fetch()) { ?>
                    <tr>
                        <td><?php echo $docCorbeille['idd']; ?></td>
                        <td><?php echo $docCorbeille['tit']; ?></td>
                        <td><?php echo $docCorbeille['pil']; ?></td>
                        <td><?php echo $docCorbeille['co']; ?></td>
                        <td><?php echo $docCorbeille['support']; ?></td>
                        <td><?php echo $docCorbeille['mise']; ?></td>
                        <td><?php echo $docCorbeille['sous']; ?></td>
                        <td><?php echo $docCorbeille['dest']; ?></td>
                        <td><?php echo $docCorbeille['lieu']; ?></td>
                        <td> 
                            <a href="restaurer_document.php?idd=<?php echo $docCorbeille['idd']; ?>">
                                Restaurer
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
