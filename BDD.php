<?php
    try{
        //Appel de la Base De Donnée (BDD)
        $BDD=new PDO('mysql:host=mysql-cauet-clement.alwaysdata.net; dbname=cauet-clement_covid; charset=utf8','229084_cauet','Cauet1234*');
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
?>