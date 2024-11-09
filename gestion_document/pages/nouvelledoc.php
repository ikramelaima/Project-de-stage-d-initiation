<!DOCTYPE html>
<?php
 require_once('identifier.php');
 require_once('connexiondb.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nouvelle document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
</head>
<body>
<?php include("menu.php");?>


<div class="container">



<div class="panel panel-primary margetop60">
<div class="panel-heading">Veuillez saisir les données du document</div>
<div class="panel-body">
<form method="POST" action="insertdoc.php" class="form">

<div class="form-group">
    <label for="">Titre du document</label>
    <input type="text" name="titre"  
           placeholder="Titre du document"
           class="form-control">
         
           
</div>


<div class="form-group">
    <label for="pilote">Pilote</label>
    <input type="text" name="pilote"  
           placeholder="Pilote:Gère le doc"
           class="form-control">         
</div>
<div class="form-group">
    <label for="">Code </label>
    <input type="text" name="code"  
           placeholder="Exemple:ESU.PS08"
           class="form-control">
</div>
<div class="form-group">
    <label >Support du document</label> 
    <select name="support" class="form-control">
           <option >Papier</option>
            <option >Numérique</option>
    </select>
</div>
<div class="form-group">
    <label for="">Mise à jour</label>
    <input type="date" name="mise_jour"  
           class="form-control" >
</div>
<div class="form-group">
    <label >Souscripteur <br>Fournisseur</label>
    <input type="text" name="fournisseur"  
           placeholder="Exemple:chef de service technique"
           class="form-control">
</div>
<div class="form-group">
   <label for="Destinataires">Destinataires:</label>
         <select name="Destinataires" class="form-control" id="Destinataires">
           <option value="section SLAI">Service technique navigation</option>
            <option value="section CNS">section CNS</option>
            <option value="section X">Service SSQE</option>
            <option value="section Z">Service éxploitation aéroportuaire</option>
             <option value="section YY">Section ressources</option>
         </select>
</div>
<div class="form-group">
    <label for="">Lieu du classement</label>
    <input type="text" name="lieu"  
          
           class="form-control">
</div>

<div class="form-group">
                             <label for="pdf">Document:</label>
                            <input type="file" name="pdf" />
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