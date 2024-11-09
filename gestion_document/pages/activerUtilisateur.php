<?php
        
        session_start();
        if(isset($_SESSION['user'])){
            
            
            require_once('connexiondb.php');
            
            $iduser=isset($_GET['iduser'])?$_GET['iduser']:0;
            
            $etat=isset($_GET['etat'])?$_GET['etat']:0;
        
            if($etat==1)
                $newEtat=0;
            else
                $newEtat=1;

            $requete="update utilisateurs set etat=? where iduser=?";
            
            $params=array($newEtat,$iduser);
            
            $resultat=$pdo->prepare($requete);
            
            $resultat->execute($params);
            
            header('location:utilisateurs.php');
        }else {
            header('location:login.php');
    }
            

?>