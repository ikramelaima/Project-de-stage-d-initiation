
<?php
try {

    $pdo = new PDO("mysql:host=localhost;dbname=gestion_docs",
        "root", "");

}catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}
?>