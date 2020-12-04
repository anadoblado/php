<?php
require_once 'Animal.php';
require_once 'Ave.php';

class Pinguino extends Ave {
    protected $libre;
    
    
    public function __construct($nombre, $come, $color, $vuelo, $libre) {
        parent::__construct($nombre, $come, $color, $vuelo);
        $this->libre=$libre;
    }

    public function __get($name) {
        return parent::__get($name);
    }

    public function __set($name, $value) {
        parent::__set($name, $value);
    }

    public function __toString() {
       return parent::__toString()." vivo en libertad? " . $this->libre;
    }
    public static function cantidad() {
        return parent::cantidad();
    }

    public function __destruct() {
        parent::__destruct();
    }

    public  function miembrosManada() {
        return parent::miembrosManada();
    }

}

