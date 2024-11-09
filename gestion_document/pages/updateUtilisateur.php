<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $iduser=isset($_POST['iduser'])?$_POST['iduser']:0;
    $nomprenom=isset($_POST['nomprenom'])?$_POST['nomprenom']:"";
    $fonction=isset($_POST['fonction'])?$_POST['fonction']:"";
    $groupe=isset($_POST['groupe'])?$_POST['groupe']:"";
    $email=isset($_POST['email'])?strtoupper($_POST['email']):"";
    $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    echo $nomPhoto ."<br>";
    echo $imageTemp;
    if(!empty($nomPhoto)){
        $requete="update utilisateurs set nomprenom=?,fonction=?,groupe=?,email=?,photo=? where iduser=?";
        $params=array($nomprenom,$fonction,$groupe,$email,$nomPhoto,$iduser);
    }else{
        $requete="update utilisateurs set nomprenom=?,fonction=?,groupe=? , email=? where iduser=?";
        $params=array($nomprenom,$fonction,$groupe,$email,$iduser);
    }

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:utilisateurs.php');

?>
