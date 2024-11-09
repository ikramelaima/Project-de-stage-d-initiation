<?php
     require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nomprenom=isset($_POST['nomprenom'])?$_POST['nomprenom']:"";
     
    $fonction=isset($_POST['fonction'])?$_POST['fonction']:"";
     
    $Groupes=isset($_POST['Groupes'])?$_POST['Groupes']:"";

    $Admin=isset($_POST['Admin'])?$_POST['Admin']:"";
    $email=isset($_POST['Email'])?$_POST['Email']:"";
    $pwd=isset($_POST['mode_passe'])?$_POST['mode_passe']:"";
    
    $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto); 
    $requete="insert into  utilisateurs (nomprenom,fonction,groupe,admiin,photo,email) values(?,?,?,?,?,?)";
    $params=array($nomprenom,$fonction,$Groupes,$Admin,$nomPhoto,$email);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:utilisateurs.php');
?>