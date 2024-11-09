<?php
require_once("connexiondb.php");

$nomf = isset($_GET['nomF']) ? $_GET['nomF'] : "";
$Destinataires = isset($_GET['Destinataires']) ? $_GET['Destinataires'] : "all";


$size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;

    $offset = $offset=($page-1)*$size;
if ($Destinataires == "all") {
    $requete = "SELECT * FROM doc WHERE titre LIKE '%$nomf%' 
    limit $size  
    offset $offset  
        ";

        $requetecount="SELECT count(*) countd FROM doc WHERE titre LIKE '%$nomf%'";
} else {
    $requete = "SELECT * FROM doc WHERE titre LIKE '%$nomf%' AND destinataires = '$Destinataires'
     ";
   $requetecount="SELECT count(*) countd  FROM doc WHERE titre LIKE '%$nomf%' AND destinataires = '$Destinataires'";

   
}

// Exécution de la requête
$result = $pdo->query($requete);
$resultcount=$pdo->query($requetecount);
$tabcount=$resultcount->fetch();
$nbdoc=$tabcount['countd'];
$reste=$nbdoc% $size; // % le reste de la division euclidienne de nbdoc par $size
if($reste==0)
   $nbrPage=$nbdoc/$size;
   else
        $nbrPage=floor($nbdoc/$size)+1;  // floor : la partie entière d'un nombre décimal
?>

<!-- Reste du code HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-eq:uiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
</head>

<body>
    <?php include("menu.php");?>
      
         <div class="container">

             <div class="panel panel-info margetop60">
               <div class="panel-heading">Recherche...</div>
                  <div class="panel-body">
                  <form method="get" action="documents.php" class="form-inline">

                    <div class="form-group">
                        <input type="text" name="nomF"  
                               placeholder="Titre du document"
                               class="form-control"
                               value="<?php echo $nomf ?>"/>
                    
                               
                    </div>
                    
                    <label for="Destinataires">Destinataires:</label>
                    <select name="Destinataires" class="form-control" id="Destinataires"
                          onchange="this.form.submit()" >
                            <option value="all"<?php if($Destinataires==="all") echo "selected" ?>>Tous les destinataires</option>
                            <option value="section SLAI"<?php if($Destinataires==="section SLAI") echo "selected" ?>>Service technique navigation</option>
                            <option value="section CNS"<?php if($Destinataires==="section CNS") echo "selected" ?>>section CNS</option>
                            <option value="section X"<?php if($Destinataires==="section X") echo "selected" ?>>Service SSQE</option>
                            <option value="section Z"<?php if($Destinataires==="section Z") echo "selected" ?>>Service éxploitation aéroportuaire</option>
                            <option value="section YY"<?php if($Destinataires==="section YY") echo "selected" ?>>Section ressources</option>
                          </select>
                          <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher... 
                          </button> 
                        &nbsp;&nbsp;
                        <a href="nouvelledoc.php">
                            
                            <span class="glyphicon glyphicon-plus"></span>
                            
                            Nouvelle document
                            
                        </a>
                    </form>
                     </div>
            </div>

    <div class="panel panel-primary ">
        <div class="panel-heading">Les documents (<?php  echo $nbdoc ?>Documents) </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                               <th>ID</th>
                               <th>Titre</th>
                               <th>Pilote</th>
                               <th>Code</th>
                               <th>Support_document</th>
                               <th>Mise à jour</th>
                               <th>Souscripteur <br> Fournisseur</th>
                               <th>Destinataires </th>
                               <th>Lieu du classement</th>
                               <th>Action</th>
                               <th>Privilege</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php while($docm=$result->fetch()){ ?> 
                            <tr>
                               
                                    <td><?php echo $docm['iddocs'] ?> </td>
                                    <td><?php echo $docm['titre'] ?> </td>
                                    <td><?php echo $docm['pilote'] ?> </td>
                                    <td><?php echo $docm['code'] ?> </td> 
                                    <td><?php echo $docm['support_document'] ?> </td>
                                    <td><?php echo $docm['mise_ajour'] ?> </td>
                                    <td><?php echo $docm['souscripteur'] ?> </td>
                                    <td><?php echo $docm['destinataires'] ?> </td>
                                    <td><?php echo $docm['lieu_du_classement'] ?> </td>
                                    <td> 
                                        <a href="editerdoc.php?iddocs=<?php echo $docm['iddocs'] ?>">
                                          <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        &nbsp;
                                        <a onclick="return confirm('Etes vous sur de vouloir supprimer le document')"
                                        href="suprimerdoc.php?iddocs=<?php echo $docm['iddocs'] ?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                     </td>
                                     <td><a type="submit" class="btn btn-success"  href="téléchargedoc.php">
        <span class="glyphicon glyphicon-save"></span>
        télécharger </a>
      </button></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="documents.php?page=<?php echo $i;?>&nomF=<?php echo $nomf ?>&Destinataires=<?php echo $Destinataires ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                
                </div>
    </div>
    </div>

</body>
</html>