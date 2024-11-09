<?php
        session_start();
        if(isset($_SESSION['user']) ){
            
            if($_SESSION['user']['admiin']=='OUI'){
               
                require_once('connexiondb.php');
                
                $iduser=isset($_GET['iduser'])?$_GET['iduser']:0;

                $requete="delete from utilisateurs where iduser=?";
                
                $params=array($iduser);
                
                $resultat=$pdo->prepare($requete);
                
                $resultat->execute($params);
                
                header('location:utilisateurs.php'); 
                
            }else{
                $message="Vous n'avez pas le privilège de supprimer un utilisateur!!!";
                
                $url='utilisateurs.php';
                
                header("location:alerte.php?message=$message&url=$url"); 
            }
           
        }else {
                header('location:login.php');
        }
?>