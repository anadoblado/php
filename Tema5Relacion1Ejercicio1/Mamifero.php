<?php
require_once 'Animal.php';

class Mamifero extends Animal{
    protected $domestico;
    
    function __construct($nombre, $come, $color, $domestico) {
        parent::__construct($nombre, $come, $color);
        $this->domestico=$domestico;
    }
    
    public function __toString() {
      return  parent::__toString()." soy doméstico? ".$this->domestico;
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

    public static function cantidad() {
        return parent::cantidad();
    }

    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

