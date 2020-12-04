<?php


class Producto {
    private $codigo;
    private $nombre;
    private $precio;
    
//    public function __construct($codigo, $nombre, $precio) {
//        $this->codigo = $codigo;
//        $this->nombre = $nombre;
//        $this->precio = $precio;
//    }

    public function __construct($cod="", $nom="", $pre=""){
        $this->codigo=$cod;
        $this->nombre=$nom;
        $this->precio=$pre;
    }
    
    public function nuevoProducto($cod, $nom, $pre) {
        $this->codigo=$cod;
        $this->nombre=$nom;
        $this->precio=$pre;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
    
    public function __toString() {
        return "Codigo: ".$this->codigo." nombre: " .$this->nombre. " precio ".$this->precio;
    }
    
   
    
  
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

