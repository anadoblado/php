<?php

require_once 'Vehiculo.php';

class Coche extends Vehiculo{
    
 
    public function __construct() {
        parent::__construct();
    }

    public function quemaRueda(){
        echo "Quemando rueda!!<br>";
    }
//    public function __get($name) {
//        return parent::__get($name);
//    }
//
//    public function __set($name, $value) {
//        parent::__set($name, $value);
//    }
//
//    public function __toString() {
//        parent::__toString();
//    }

    public static function getVehiculosCreados() {
        return parent::getVehiculosCreados();
    }

}

