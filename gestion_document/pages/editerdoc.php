<?php 
 require_once('identifier.php');
require_once('connexiondb.php');
$iddocs=isset($_GET['iddocs'])?$_GET['iddocs']:0;
$requete="select * from doc where iddocs=$iddocs";
$resultat=$pdo->query($requete);
$doc=$resultat->fetch();

$titre=$doc['titre'];
    $pilote=$doc['pilote'];
     
    $code=$doc['code'];
     
    $support=$doc['support_document'];
     
    $mise=$doc['mise_ajour'];
     
    $fournisseur=$doc['souscripteur'];
     
    $destinataires=$doc['destinataires'];
     
    $lieu=$doc['lieu_du_classement'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Édition d'un document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    <link rel="stylesheet" href="../css/jquery-ui-1.10.4.custom.css">
        <link rel="stylesheet" href="../css/monStyle.css">
        <script src="../js/jquery-1.10.2.js"></script>
        <script src="../js/jquery-ui-1.10.4.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/school.js"></script>
        <script src="js/jquery-ui-i18n.min.js"></script>

        <script>
        $(function () {
            // définit les options par défaut du calendrier
            $.datepicker.setDefaults({
                showButtonPanel: true,// affiche des boutons sous le calendrier
                showOtherMonths: true, // affiche les autres mois
                selectOtherMonths: true // possibilités de sélectionner les jours des autres mois
            });

            //$("#calendar").datepicker(); // affiche le calendrier par défaut
            //$("#calendar").datepicker($.datepicker.regional["fr"]); // affiche le calendrier en fr
            $("#calendar").datepicker({
                dateFormat: "yy-mm-dd",

            });
            $("#mise_ajour").datepicker({
                dateFormat: "yy-mm-dd",

            });
        });
    </script>
</head>
<body>
<?php include("menu.php");?>


<div class="container">

    <div class="panel panel-primary margetop60">
        <div class="panel-heading">Édition du document</div>
            <div class="panel-body">
               <form method="POST" action="updatedoc.php" class="form">
                   <div class="form-group">
                        <label for="">id du document</label>
                        <input type="text" name="iddocs"  
                       class="form-control" value="<?php echo $iddocs?>"/>         
                   </div>

<div class="form-group">
    <label for="titre">Titre du document</label>
    <input type="text" name="titre"  
           placeholder="Titre du document"
           class="form-control"
           value="<?php echo $titre?>"/>
         
           
</div>


<div class="form-group">
    <label for="pilote">Pilote</label>
    <input type="text" name="pilote"  
           placeholder="Pilote:Gère le doc"
           class="form-control"
           value="<?php echo $pilote?>"/>
                  
</div>
<div class="form-group">
    <label for="code">Code </label>
    <input type="text" name="code"  
           placeholder="Exemple:ESU.PS08"
           class="form-control"
           value="<?php echo $code?>"/>
         
</div>
<div class="form-group">
    <label for="support">Support du document</label> 
    <select name="support" class="form-control">
           <option value="papier" <?php if( $support=="papier") echo "selected" ?>>Papier</option>
            <option value="Numérique" <?php if( $support=="Numérique") echo "selected" ?>>Numérique</option>
    </select>
</div>
<div class="form-group">
    <label for="mise">Mise à jour</label>
    <input type="date" name="mise_ajour"  id="mise_ajour" 
           class="form-control"
           value="<?php echo $mise?>"/> 
</div>
<div class="form-group">
    <label for="fournisseur">Souscripteur <br>Fournisseur</label>
    <input type="text" name="fournisseur"  
           placeholder="Exemple:chef de service technique"
           class="form-control" 
           value="<?php echo  $fournisseur?>"/>
</div>
<div class="form-group">
   <label for="Destinataires">Destinataires:</label>
         <select name="Destinataires" class="form-control" id="Destinataires">
         <option value="all"<?php if($Destinataires==="all") echo "selected" ?>>Tous les destinataires</option>
                            <option value="SERVICE TECHNIQUE NAVIGATION"<?php if($destinataires==="SERVICE TECHNIQUE NAVIGATION") echo "selected" ?>>Service technique navigation</option>
                            <option value="SERVICE EXPLOITATION AEROPORTUAIREI"<?php if($destinataires==="SERVICE EXPLOITATION AEROPORTUAIREI") echo "selected" ?>>service éxploitation aeroportuairei </option>
                            <option value="SERVICE RESSOURCES & ACTIVITÉS CONCEDEES"<?php if($destinataires==="SERVICE RESSOURCES & ACTIVITÉS CONCEDEES") echo "selected" ?>>service ressources & activités concedées </option>
                            <option value="SECTION CONTROLE AERIEN"<?php if($destinataires==="SECTION CONTROLE AERIEN") echo "selected" ?>>service controle aerien</option>
                            <option value="SERVICE GESTION DE LA SURETÉ , SÉCURITÉ,QUALITÉ & ENVIRONNEMENT"<?php if($destinataires==="SERVICE GESTION DE LA SURETÉ , SÉCURITÉ,QUALITÉ & ENVIRONNEMENT") echo "selected" ?>>service SSQE</option>
         </select>
</div>
<div class="form-group">
    <label for="lieu">Lieu du classement</label>
    <input type="text" name="lieu"  
          
           class="form-control"
           value="<?php echo $lieu?>"/>
</div>

 
      <button type="submit" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>
        Enregistrer
      </button>
</form>

</div>
</div>
</body>
</html>