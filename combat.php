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
    <title>Combat</title>
</head>
<body>
    
    <?php
        include "function.php"; 

        if($access){
        
            echo "BIENVENUE sur CE COMBAT ".$joueur->getlogin();
            echo "TU COMBAT AVEC ".$joueur->getNomPerso();
            echo '<a href="index.php" >retour menu</a>';
    
        }else{
            echo $errorMessage;
        }
    ?>
</body>
</html>