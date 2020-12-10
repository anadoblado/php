<?php

class Usuario{
    private $nombre;
    private $password;
    
    public  function __construct($nombre, $password) {
        $this->nombre = $nombre;
        $this->password = $password;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }


}

