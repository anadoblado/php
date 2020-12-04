<?php
require_once 'Animal.php';
require_once 'Ave.php';

class Cananrio extends Ave{
    public function __construct($nombre, $come, $color, $vuelo) {
        parent::__construct($nombre, $come, $color, $vuelo);
    }

    public function __get($name) {
        return parent::__get($name);
    }

    public function __set($name, $value) {
        parent::__set($name, $value);
    }

    public static function cantidad() {
        return parent::cantidad();
    }

    public function __destruct() {
        parent::__destruct();
    }

    public function __toString() {
        return parent::__toString();
    }

    public  function miembrosManada() {
        return parent::miembrosManada();
    }

}

