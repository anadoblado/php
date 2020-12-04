<?php
require_once 'Animal.php';

class Lagarto extends Animal {
    protected $continente;
    public function __construct($nombre, $come, $color, $continente) {
        parent::__construct($nombre, $come, $color);
        $this->continente=$continente;
    }

    public function __destruct() {
        parent::__destruct();
    }

    public function __get($name) {
        return parent::__get($name);
    }

    public function __set($name, $value) {
        parent::__set($name, $value);
    }

    public function __toString() {
        return parent::__toString() . " vivo en " . $this->continente;
    }

    public static function cantidad() {
        return parent::cantidad();
    }

}

