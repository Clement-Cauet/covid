<?php 

    include('class/utilisateur.php');
    include('class/perso.php');
    //GESTION DE LA BASE -----------------------
    $BDD = null;
    $access = null;
    $errorMessage="";
    try{
        $user = "ccauet";
        $pass = "Cauet1234*";
        $BDD = new PDO('mysql:host=mysql-ccauet.alwaysdata.net;dbname=ccauet_covid', $user, $pass);                

    }catch(Exception $e){
        $errorMessage .= $e->getMessage();
    }

    $joueur = new utilisateur($BDD);

    //GESTION DES SESSION -----------------------
    if(!is_null($BDD)){
        if (isset($_SESSION["Connected"]) && $_SESSION["Connected"]===true){
            $access = true;
            if(isset($_SESSION["id"])){
                $joueur->setUserById($_SESSION["id"]);
            }
            $access = $joueur->deconnexion();
        }else{
            $access = false;
            $errorMessage.= "Vous devez vous connectez";
            // Affichage de formulaire si pas deconnexion
            $access = $joueur->connexion();
        }
    
    }else{
        $errorMessage.= "Vous n'avez pas les bases";
    }

?>