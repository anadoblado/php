<?php

require_once 'Animal.php';
require_once 'Mamifero.php';
class Gato extends Mamifero{
    protected $edad;
    
    public function __construct($nombre, $come, $color, $domestico, $edad) {
        parent::__construct($nombre, $come, $color, $domestico);
        $this->edad=$edad;
    }

    public function __get($name) {
        return parent::__get($name);
    }

    public function __set($name, $value) {
        parent::__set($name, $value);
    }

    public function __toString() {
       return parent::__toString() ." tengo ". $this->edad . " años";
    }
    public function __destruct() {
        parent::__destruct();
    }

    public static function cantidad() {
        return parent::cantidad();
    }

}

