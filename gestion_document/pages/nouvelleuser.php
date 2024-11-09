<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
   
    $requeteF="select * from utilisateurs";
    $resultatF=$pdo->query($requeteF);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nouvelle utilisateur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
</head>
<body>
<?php include("menu.php");?>
<div class="container">



<div class="panel panel-primary margetop60">
<div class="panel-heading">Création d'un nouveau compte utilisateur</div>
<div class="panel-body">
<form method="POST" action="insertuser.php" class="form" enctype="multipart/form-data">

<div class="form-group">
    
    <label for="">Pseudo :</label>
    <input type="text" name="nomprenom"  
           placeholder="Taper votre Nom et Prénom en majuscule"
           class="form-control">
         
           
</div>

<div class="form-group">
    <label for="">Email:</label>
    <input type="email" name="Email"  
           placeholder="Email"
           class="form-control">
         
</div>
<div class="form-group">
    <label for="">Mode passe </label>
    <input type="password" name="mode_passe"  
           placeholder="Taper votre mot de passe"
           class="form-control">
</div>

<div class="form-group">
    <label for="pilote">Fonction</label>
    <input type="text" name="fonction"  
           placeholder="Fonction"
           class="form-control">         
</div>

<div class="form-group">
   <label for="Groupes">Groupes:</label>
         <select name="Groupes" class="form-control" id="Groupes">
           <option value="SERVICE TECHNIQUE NAVIGATION">Service technique navigation</option>
            <option value="SECTION CONTROLE AERIEN ">section controle aerien</option>
            <option value="SERVICE GESTION DE LA SURETÉ ET LA SÉCURITÉp">Service SSQE</option>
            <option value="SERVICE AERIENNE">Service éxploitation aéroportuaire</option>
             <option value="SERVICE RESSOURCES & ACTIVITÉS CONCEDEES">Section ressources</option>
             <option value="SERVICE EXPLOITATION AEROPORTUAIRE">service exploitation aeroportuairei</option>
         </select>
</div> 
<div class="form-group">
                            <label for="Admin">Admin :</label>
                            <div class="radio">
                                <label><input type="radio" name="Admin" value="NON" checked/> visiteur </label><br>
                                <label><input type="radio" name="Admin" value="OUI"/> Administrateur </label>
</div>

<div class="form-group">
                            <label for="Admin">Etat:</label>
                            <div class="radio">
                                <label><input type="radio" name="etat" value="Activé" checked/> Activé</label><br>
                                <label><input type="radio" name="etat" value="Désactivé"/>Désactivé</label>
</div>
<div class="form-group">
                             <label for="photo" >Photo :
                                <span style="color: red;"> <i>L'image au format PNG ne doit pas dépasser une largeur et une hauteur de 499 pixels.</i></span>
    <input type="file" name="photo" />
                             </label>
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