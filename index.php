<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title></title>
</head>
<body>
    
    <?php
        include "function.php";

        if($access){
            
            echo "BIENVENUE sur MON SITE".$joueur->getLogin();
            echo '<a href="combat.php">vient combattre</a>';
            $perso = new perso($BDD);
            $perso->getListPerso();
            if(!$perso->getId()==0){
                $joueur->setPersonnage($perso);
            }
            
            if(!empty($perso->getNom())){
                echo '<a href="combat.php">vient combatre avec'.$perso->getNom().'</a>';
            }else{
                echo '<a href="combat.php">vient combatre avec'.$joueur->getNomPerso().'</a>';
            }

        }else{
            echo $errorMessage;
        }
    ?>
</body>
</html>