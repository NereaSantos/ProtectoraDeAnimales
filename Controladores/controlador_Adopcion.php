<?php
require_once("Adopcion.php");
require_once("Animal.php");
require_once("Usuario.php");
  class Controlador {
   private $adopcion;
    public function __construct() {
        $this->adopcion = new Adopcion();
    }

   public function listarAdopciones(){
        require_once("Vistas/vista_Adopcion.php");
   }
       
}

?>