<?php 
require_once('identifier.php');
require_once("connexiondb.php");

$nomprenom = isset($_GET['nomprenom']) ? $_GET['nomprenom'] : "";
$Groupes = isset($_GET['Groupes']) ? $_GET['Groupes'] : "all";


$size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;

    $offset = $offset=($page-1)*$size;
if ($Groupes== "all") {
    $requete = "SELECT * FROM utilisateurs WHERE nomprenom  LIKE '%$nomprenom%' 
    limit $size  
    offset $offset  
        ";

        $requetecount="SELECT count(*) countd FROM utilisateurs WHERE nomprenom LIKE '%$nomprenom%'";
} else {
    $requete = "SELECT * FROM utilisateurs WHERE nomprenom LIKE '%$nomprenom%' AND groupe = '$Groupes'
     ";
   $requetecount="SELECT count(*) countd  FROM utilisateurs WHERE nomprenom LIKE '%$nomprenom%' AND groupe = '$Groupes'";

   
}

// Exécution de la requête
$result = $pdo->query($requete);
$resultcount=$pdo->query($requetecount);
$tabcount=$resultcount->fetch();
$nbuser=$tabcount['countd'];
$reste=$nbuser% $size; // % le reste de la division euclidienne de nbdoc par $size
if($reste==0)
   $nbrPage=$nbuser/$size;
   else
        $nbrPage=floor($nbuser/$size)+1;  // floor : la partie entière d'un nombre décimal
?>

<!-- Reste du code HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-eq:uiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
</head>

<body>
    <?php include("menu.php");?>
      
         <div class="container">

             <div class="panel panel-success margetop60">
               <div class="panel-heading">Recherche des utilisateurs</div>
                  <div class="panel-body">
                  <form method="get" action="utilisateurs.php" class="form-inline">

                    <div class="form-group">
                        <input type="text" name="nomprenom"  
                               placeholder="Nom ou Prénom de utilistateur "
                               class="form-control"
                               value="<?php echo $nomprenom?>"/>
                    
                    </div>
                
                    <label for="Groupes">Groupes:</label>
                    <select name="Groupes" class="form-control" id="Groupes"
                          onchange="this.form.submit()" >
                            <option value="all"<?php if($Groupes==="all") echo "selected" ?>>Tous les groupes</option>
                            <option value="SERVICE TECHNIQUE NAVIGATION"<?php if($Groupes==="SERVICE TECHNIQUE NAVIGATION") echo "selected" ?>>service technique navigation</option>
                            <option value="SECTION CONTROLE AERIEN"<?php if($Groupes==="SECTION CONTROLE AERIEN") echo "selected" ?>>section controle aerien </option>
                            <option value="SERVICE GESTION DE LA SURETÉ ET LA SÉCURITÉ"<?php if($Groupes==="SERVICE GESTION DE LA SURETÉ ET LA SÉCURITÉ") echo "selected" ?>>service gestion de la sureté et la sécurité</option>
                            <option value="SERVICE AERIENNE"<?php if($Groupes==="SERVICE AERIENNE") echo "selected" ?>>service aerienne</option>
                            <option value="SERVICE RESSOURCES & ACTIVITÉS CONCEDEES"<?php if($Groupes==="SERVICE RESSOURCES & ACTIVITÉS CONCEDEES") echo "selected" ?>>service ressources & activés concedées</option>
                            <option value="SERVICE EXPLOITATION AEROPORTUAIRE"<?php if($Groupes==="SERVICE EXPLOITATION AEROPORTUAIRE") echo "selected" ?>>service exploitation aeroportuairei</option>
                          </select>
                          <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher... 
                          </button> 
                        &nbsp;&nbsp;
                        <a href="nouvelleuser.php">
                            
                            <span class="glyphicon glyphicon-plus"></span>
                            
                            Nouveau utilisateur
                            
                        </a>
                    </form>
                     </div>
            </div>

    <div class="panel panel-primary ">
        <div class="panel-heading">Liste des utilisateur (<?php  echo $nbuser ?> utilisateurs) </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead >
                            <tr class="success">
                               <th>ID</th>
                               <th>PSEUDO</th>
                               <th>FONCTION</th>
                               <th>GROUPE</th>
                               <th>ADMIN</th>
                               <th>STATUS</th>
                               <th>PROFIL</th>
                               <th>ACTION</th>
                              
                               
                            </tr>
                        </thead>
                        <tbody>
                             <?php while($users=$result->fetch()){ ?> 
                            <tr>
                            <tr class="<?php echo $users['etat']==1?'':'danger'?>">
                                    <td><?php echo $users['iduser']  ?> </td>
                                    <td><?php echo $users['nomprenom'] ?> <?php echo $users['prenom'] ?> </td>
                                    <td><?php echo $users['fonction'] ?> </td>
                                    <td><?php echo $users['groupe'] ?> </td> 
                                    <td><?php echo $users['admiin'] ?> </td>
                                    <td><?php echo $users['etat'] ?> </td>
                                    <td>
                                        <img src="../images/<?php echo $users['photo'] ?>"
                                        width="50px" height="50px" class="img-circle" > 
                             </td>
                             <td>
                                        <a href="editerUtilisateur.php?iduser=<?php echo $users['iduser'] ?>">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a onclick="return confirm('Etes vous sur de vouloir supprimer cet utilisateur')"
                                            href="supprimerUtilisateur.php?iduser=<?php echo $users['iduser'] ?>">
                                                <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        &nbsp;&nbsp;
                <a href="activerUtilisateur.php?iduser=<?php echo $users['iduser'] ?>&etat=<?php echo $users['etat']  ?>">  
                                                <?php  
                                                    if($users['etat']==1)
                                                        echo '<span class="glyphicon glyphicon-remove"></span>';
                                                    else 
                                                        echo '<span class="glyphicon glyphicon-ok"></span>';
                                                ?>
                                            </a>
                                        </td>       
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="utilisateurs.php?page=<?php echo $i;?>&nom=<?php echo $nom ?>&Groupes=<?php echo $Groupes ?>">
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