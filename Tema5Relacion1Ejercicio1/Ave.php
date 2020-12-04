<?php
require_once 'Animal.php';

class Ave extends Animal{
    protected $vuelo;
    protected static $manada = 0;


    public function __construct($nombre, $come, $color, $vuelo) {
        parent::__construct($nombre, $come, $color);
        $this->vuelo = $vuelo;
        self::$manada++;
    }

    public function __toString() {
        return parent::__toString(). " vuelo? ". $this->vuelo;
    }
    
    public  function miembrosManada(){
        return self::$manada;
    }
    
    public function __destruct() {
        return self::$manada--;
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

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

