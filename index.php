<?php
    include('BDD.php');

    if(isset($_POST['log']) && isset($_POST['pass'])){
        $username = $_POST['log'];
        $password = $_POST['pass'];
        $req = "SELECT count(*) FROM utilisateur where login = '".$username."' and pass = '".$password."' ";
        $RequetStatement=$BDD->query($req);
        $count=$RequetStatement->fetchColumn();
        if($count!=0){
            echo 'Coucou';
        }
    }
    if(isset($_POST['deco'])){
        unset($_POST);
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid</title>
</head>
<body>
<form method="post">
    <div class="login">
        <input type="text" id="login" name="log" placeholder="Votre login" autocomplete="off" autocapitalize="off" required></input>
    </div>
    <div class="password">
        <input type="password" id="mdp" name="pass" placeholder="Votre mot de passe" autocomplete="off" autocapitalize="off" required></input>
    </div>
    <div class="submit">
        <input type="submit" class="connexion" value="Connexion"></input>
    </div>
</form>
<form method="post">
    <div class="submit">
        <input type="submit" class="deconnexion" name="deco" value="Déconnexion"></input>
    </div>
</form>    
</body>
</html>