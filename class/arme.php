<?php

class arme{

   private $_id;
   private $_nom;
   private $_degat;
   private $_pdo;

   public function __construct($id,$pdo){
      $this->_id = $id;
      $this->_pdo = $pdo;
   
      $req = "select * from Armes where ID = '".$this->_id."'";
      $Resul = $pdo->query($req);
      if($tab = $Resul->fetch()){
         $this->_nom = $tab['Nom'];
      }
      //sac
   
   }
   public function getNom(){
      return $this->_nom;
   }
}
?>