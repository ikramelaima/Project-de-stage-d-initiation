<?php 

require_once('identifier.php');

 require_once('connexiondb.php');
 $iddoc=isset($_POST['iddocs'])?$_POST['iddocs']:"";
$titre=isset($_POST['titre'])?$_POST['titre']:"";
    $pilote=isset($_POST['pilote'])?$_POST['pilote']:"";
     
    $code=isset($_POST['code'])?$_POST['code']:"";
     
    $support=isset($_POST['support'])?$_POST['support']:"";
     
    $mise=isset($_POST['mise_ajour'])?$_POST['mise_ajour']:"";
     
    $fournisseur=isset($_POST['fournisseur'])?$_POST['fournisseur']:"";
     
    $destinataire=isset($_POST['Destinataires'])?strtoupper($_POST['Destinataires']):"";
     
    $lieu=isset($_POST['lieu'])?$_POST['lieu']:"";

    $requete="update doc set titre=?,pilote=?, code=? , support_document=? ,mise_ajour=?, souscripteur=? , destinataires=?, lieu_du_classement=?    where iddocs=?";

    $params=array($titre,$pilote,$code,$support,$mise, $fournisseur,$destinataire, $lieu,$iddoc);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:documents.php');

    
    ?>