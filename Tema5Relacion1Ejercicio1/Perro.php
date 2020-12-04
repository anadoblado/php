<?php

require_once 'Animal.php';
require_once 'Mamifero.php';

class Perro extends Mamifero{
    protected $raza;
    
    public function __construct($nombre, $come, $color, $domestico, $raza) {
        parent::__construct($nombre, $come, $color, $domestico);
        $this->raza = $raza;
    }

    public function __get($name) {
        return parent::__get($name);
    }

    public function __set($name, $value) {
        parent::__set($name, $value);
    }

    public function __toString() {
        return parent::__toString(). " soy de la raza " .$this->raza;
    }
    public function __destruct() {
        parent::__destruct();
    }

    public static function cantidad() {
        return parent::cantidad();
    }

}

