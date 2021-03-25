<?php

class perso{

    private $_id;
    private $_nom;
    private $_vie;
    private $_attaque;
    private $_sac;

    private $_bdd;
    //méthode
    public function __construct($BDD){
        $this->_bdd = $BDD;
    }

    public function setPerso($id, $nom, $vie, $attaque){
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_vie = $vie;
        $this->_attaque = $attaque;
    }

    public function setPersoById($id){
        $req = "select * from perso where idperso='".$id."'";
        $Resul = $this->_bdd->query($req);
        if($tab = $Resul->fetch()){
            $this->setPerso($tab['id'], $tab['nom'], $tab['vie'], $tab['attaque']);
        }
    }

    public function getListPerso(){
        $req = "select * from perso where 1";
        $Resul = $this->_bdd->query($req);
        ?>
            <form method="post" onchange="this.submit()">
                <select name="idPero" id="idPerso">
                <option value="">-Aucun-</option>
                    <?php
                        while($tab = $Resul->fetch()){
                            echo '<option value="'.$tab['id'].'">'.$tab['nom'].'</option>';
                        }
                    ?>
                </select>
            </form>
        <?php
    }

    public function getId(){
        return $this->_id;
    }

    public function getNom(){
        return $this->_nom;
    }


    public function getSac(){
        return $this->_sac;
    }

    public function getStrListeArme(){
        $string = "";
        foreach($this->_sac as $Armes)
        {
            $string = $string." ".$Armes->getNom();
        }

        return $string;
    }
}
?>