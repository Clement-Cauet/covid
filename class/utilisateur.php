<?php

    class utilisateur{
        private $_id;
        private $_perso;
        private $_login;
        private $_mdp;

        private $_bdd;

        public function __construct($BDD){
            $this->_bdd = $BDD;
        }

        public function setUser($id, $login, $mdp){
            $this->_id = $id;
            $this->_login = $id;
            $this->_mdp = $mdp;
        }

        public function setUserById($id){
            $Result = $this->_bdd->query("SELECT * FROM `User` WHERE `id`='".$id."' ");
            if($tab = $Result->fetch()){ 
                $this->setUser($tab["id"],$tab["login"],$tab["mdp"]);
                $perso = new perso($this->_bdd);
                $perso->setPersoById($tab['idperso']);
                $this->_perso = $perso;
            }
        }

        public function setperso(){
            $this->_idperso;
            $req = 'UPDATE `utilisateur` SET `idperso`='.$this->_idperso.' WHERE `id`='.$this->_id.'';
            $Result = $this->_bdd->query($req);
        }

        public function getLogin(){
            return $this->_login;
        }

        public function getNomPerso(){
            return $this->_perso->getNom();
        }

        public function connexion(){
            //traitement du formulaire
            $access = false;
            if( isset($_POST["login"]) && isset($_POST["password"])){
                //verif mdp en BDD

                $Result = $this->_bdd->query("SELECT * FROM `utilisateur` WHERE `login`='".$_POST['login']."' AND `mdp` = '".$_POST['password']."'");
                if($tab = $Result->fetch()){ 
                    //si mdp = ok
                    $access = true;
                    $_SESSION["Connected"]=true;
                    $afficheForm = false;
                    //si on est co on affiche le formulaire de deco
                    $this->deconnexion();
                }else{
                    $afficheForm = true;
                }
            }else{
                $afficheForm = true;
            }
            if($afficheForm){
            ?>
                <form action="" method="post" >
                    <div>
                        <label for="login">Enter your login: </label>
                        <input type="text" name="login" id="login" required>
                    </div>
                    <div >
                        <label for="password">Enter your pass: </label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div >
                        <input type="submit" value="Go!" >
                    </div>
                </form>

            <?php
            }
            return $access;                
        }

        public function deconnexion(){
            //traitement du formulaire
            $afficheForm = true;
            $access = true;
            if( isset($_POST["logout"]) && isset($_POST["logout"])){
                //si on se deco on raffiche le formulaire de co
                $_SESSION["Connected"]=false;
                session_unset();
                session_destroy();
                $this->connexion();
                $afficheForm = false;
                $access = false;
            }else{
                $afficheForm = true;
            }

            if($afficheForm){
            ?>
                <form action="" method="post" >
                    <div >
                        <input type="submit" value="Deco!" name="logout">
                    </div>
                </form>

            <?php
            
            }

            return $access;
        }
    }

?>