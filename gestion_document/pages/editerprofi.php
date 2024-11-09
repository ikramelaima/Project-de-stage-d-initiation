<?php
 require_once('identifier.php');
    require_once('connexiondb.php');

    $id=isset($_GET['iduser'])?$_GET['iduser']:0;

    $requete="select * from utilisateurs where iduser=$id";

    $resultat=$pdo->query($requete);
    $utilisateur=$resultat->fetch();
    $nomprenom=$utilisateur['nomprenom'];
    $fonction=$utilisateur['fonction'];
    $groupe=$utilisateur['groupe'];
    $Mode_passe=$utilisateur['mode_passe'];
    $email=$utilisateur['email'];
    $nomPhoto=$utilisateur['photo'];
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un utilisateur</title>
        <meta charset="UTF-8">
        <meta http-eq:uiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Utilisateurs</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/monstyle.css">  
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de l'utilisateur :</div>
                <div class="panel-body">
                    <form method="post" action="updateUtilisateur.php" class="form">
						<div class="form-group">
                          
                            <input type="hidden" name="iduser" class="form-control" value="<?php echo $id ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nomprenom">Pseudo:</label>
                            <input type="text" name="nomprenom" placeholder="Nom et Prénom" class="form-control" value="<?php echo $nomprenom?>"/>
                        </div>
                        
                        <div class="form-group">
                             <label for="prenom">Email :</label>
                            <input type="email" name="email" placeholder="email" class="form-control"
                                   value="<?php echo $email?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Mode de passe :</label>
                            <input type="text"  name="Mode_passe" placeholder="Mode de passe" class="form-control"
                                   value="<?php echo $Mode_passe?>"/>
                        </div>
                        <div class="form-group">
                             <label for="fonction">Fonction :</label>
                            <input type="text" name="fonction" placeholder="Fonction" class="form-control"
                                   value="<?php echo $fonction ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="groupe">Groupe :</label>
         <select name="groupe" class="form-control" id="groupe">
           <option value="SERVICE TECHNIQUE NAVIGATION"<?php if( $groupe=="SERVICE TECHNIQUE NAVIGATION") echo "selected" ?>>Service technique navigation</option>
            <option value="SECTION CONTROLE AERIEN "<?php if( $groupe=="SERVICE CONTROLE AERIEN ") echo "selected" ?>>section controle aerien</option>
            <option value="SERVICE GESTION DE LA SURETÉ ET LA SÉCURITÉ"<?php if( $groupe=="SERVICE GESTION DE LA SURETÉ ET LA SÉCURITÉ") echo "selected" ?>>Service SSQE</option>
            <option value="SERVICE AERIENNE"<?php if( $groupe=="SERVICE AERIENNE") echo "selected" ?>>Service éxploitation aéroportuaire</option>
             <option value="SERVICE RESSOURCES & ACTIVITÉS CONCEDEES"<?php if( $groupe=="SERVICE RESSOURCES & ACTIVITÉS CONCEDEES") echo "selected" ?>>Section ressources</option>
 T            <option value="SERVICE EXPLOITATION AEROPORTUAIRE"<?php if( $groupe=="SERVICE EXPLOITATION AEROPORTUAIRE") echo "selected" ?>>service exploitation aeroportuairie</option>
         </select>
</div>
                        <div class="form-group">
                             <label for="photo">Photo :</label>
                            <input type="file" name="photo" />
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button>

                        <a href="editPwd.php">Changer le mot de passe</a>
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>
