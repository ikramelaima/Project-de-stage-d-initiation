
<?php
    //require_once('identifier.php');
?>

<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container-fluid">
	
		<div class="navbar-header">
			<a href="../index.php" class="navbar-brand">Gestion des documents</a>
		</div>
		
		<ul class="nav navbar-nav">
					
			<li><a href="documents.php">
                    <i class="glyphicon glyphicon-folder-open"></i>
                     Documents
                </a>
            </li>
			<?php if ($_SESSION['user']['admiin']=='OUI') {?>
					
				<li><a href="utilisateurs.php">
                        <i class="glyphicon glyphicon-user"></i>
                      Utilisteurs
                    </a>
                </li>
				
			<?php }?>
			
		</ul>

		
		<ul class="nav navbar-nav navbar-right">
					
			<li>
				<a  href="editerprofi.php?iduser=<?php echo $_SESSION['user']['iduser'] ?>">
                    <i class="glyphicon glyphicon-user"></i>
					<?php echo  ' '.$_SESSION['user']['nomprenom']?>
				</a> 
			</li>
			
			<li>
				<a href="seDeconnecter.php">
                    <i class="glyphicon glyphicon-log-out"></i>
					&nbsp Se déconnecter
				</a>
			</li>
							
		</ul>
		
	</div>
</nav>
