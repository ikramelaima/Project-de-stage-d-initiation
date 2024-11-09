<?php
$msg = "<div class='alert alert-success' >
<h3><strong>Félicitation!</strong>, votre nouveau mot de passe est : <strong class='red-text'>0000</strong></h3>
</div>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initialiser votre mot de passe</title>
    <style>
        /* Style pour le texte en rouge */
        .red-text {
            color: red;
        }
    </style>
</head>
<body>
<?php
echo $msg;
header("refresh:5;url=login.php"); // Redirigez vers login.php après 5 secondes
?>
<!-- Le reste de votre code HTML ici -->
</body>
</html>
