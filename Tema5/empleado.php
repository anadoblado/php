<?php
require_once 'Persona.php';
class Empleado extends Persona{
    protected $salario;
    
   public function __construct($nombre = "", $apell = "", $edad = "20", $salario = 0) {
       parent::__construct($nombre, $apell, $edad); // parent hace referencia al padre, ::hace referencia a un método de la clase
   
       $this->salario=$salario;
   }
   
   // hay que sobreescribir el método toString, ya que por defecto aparece el del constructo
   public function __toString() {
       return parent::__toString()." y tengo un salario de ".$this->salario;
   }

}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

