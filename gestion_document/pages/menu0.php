
<?php
    require_once('identifier.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page d'Accueil</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
  *{
	margin: 0;
	padding: 0;
	font-family: Century Gothic;
}
header{
	background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url(../images/background-image.jpg);
	height: 100vh;
	background-size: cover;
	background-position: center;
	min-height: 100px;
}
ul{
	float:right;
	list-style-type: none;
	margin-top: 30px;
	margin-right:60px ;
	
}
ul li{
	display: inline-block;
}
ul li a{
	text-decoration: none;
	color: #fff;
	padding: 5px 20px;
	border: 1px solid transparent;
	transition: 0.5s ease;

}

ul li a:hover{
	background-color: #fff;
	color: #000;
}

ul li.active a{
background-color:#fff;
	color: #000;

}

.logo img{
	float: left;
	width: 90px;
	height: 60px;
	
}

.main{
	max-width: 1200px;
	margin: auto;
    color: #333;
}




.btn:hover{
	background-color: #fff;
	color: #000;
}

.sub-menu{
	display: none;
    top:6%;
    position: relative;
}

.sub-menu ul{
	position: absolute;

}

.main ul li:hover .sub-menu
{
	display: block;
	position: absolute;
	background-color: rgb(0,45,117);
	margin-top: 12px;
	margin-left: -8px;
}

.main ul li:hover .sub-menu ul 
{
	display: block;
	margin:6px;

}
.main ul li:hover .sub-menu ul li
{
	width: 75px;
	padding: 5px;
	border-bottom: 1px#fff;
	background: transparent;
	transition: 0.4s ease;
	text-align: left;
	border-radius: 0;
	
}

.main ul li:hover .sub-menu ul li:last-child 
{
	border-bottom: none;
}
</style>
</head>
<body>

<header>

	<div class="main">
		<div class="logo">
			<img src="../images/onda.png">
		</div>
		<ul>
		<li><button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-menu-hamburger"></span> Menu
        </button>
		 	<div class="sub-menu">
		 		<ul>	 
		 		 <li><a href="documents.php">Documents</a></li>
				  <?php if ($_SESSION['user']['admiin']== 'OUI') {?>
		 		 <li><a href="utilisateurs.php">Utilisateurs</a></li>
				  <?php }?>
		 	 </ul>
		 	</div>
		 </li>
		 <li><button type="submit" class="btn btn-success">
                    <a href="seDeconnecter.php"><span class="glyphicon glyphicon-log-out"></span>
                    Se déconnecter</a>
                </button></li>
		</ul>
		<div>
		<header>
 
</body>
</html>
