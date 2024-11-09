<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $titre=isset($_POST['titre'])?$_POST['titre']:"";
     
    $pilote=isset($_POST['pitote'])?$_POST['pilote']:"";
     
    $code=isset($_POST['code'])?$_POST['code']:"";
     
    $support=isset($_POST['support'])?$_POST['support']:"";
      
    $mise=isset($_POST['mise_jour'])?$_POST['mise_jour']:"";
     
    $fournisseur=isset($_POST['fournisseur'])?$_POST['fournisseur']:"";
     
    $destinatire=isset($_POST['Destinataires'])?$_POST['Destinataires']:"";
     
    $lieu=isset($_POST['lieu'])?$_POST['lieu']:"";
    //
    $fpdf=isset($_FILES['pdf']['name'])?$_FILES['pdf']['name']:"";
    $pdfTemp=$_FILES['pdf']['tmp_name'];
    move_uploaded_file($pdfTemp,"../fpdf/".$fpdf); 
    $requete="insert into doc (titre, pilote, code, support_document, mise_ajour, souscripteur, destinataires, lieu_du_classement,fpdf) values(?,?,?,?,?,?,?,?,?)";
    $params=array($titre,$pilote,$code,$support,$mise,$fournisseur,$destinatire,$lieu,$fpdf);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:documents.php');
?>