<?php

class Animal{
    protected $nombre;
    protected $come;
    protected $color;
    protected static $miembros = 0;
    
    function __construct($nombre, $come, $color) {
        $this->nombre = $nombre;
        $this->come = $come;
        $this->color = $color;
        self::$miembros++;
    }
    
    function __get($name) {
        return $this->$name;
    }
    
    public static function cantidad(){
        return self::$miembros;
    }
    
    public function __destruct() {
        return self::$miembros--;
    }
    
    function __set($name, $value) {
         $this->$name=$value;
    }

    function __toString() {
        return "Me llamo " .$this->nombre. " soy de color " .$this->color." y como ".$this->come;
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

