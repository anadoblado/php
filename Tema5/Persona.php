<?php

class Persona{
    // para hacer las herencias tienen que ser protected
    protected $nombre;
    protected $apell;
    protected $edad;
        protected static $numeropersona = 0;
    
    // creo un método estático cuando quiero un método que no requiera usar una instancia para poder usarlo
    function __construct($nombre="", $apell="", $edad="20") {
        $this->nombre = $nombre;
        $this->apell = $apell;
        $this->edad = $edad;
        self :: $numeropersona++;
    }
    
    public static function personas(){
        return self::$numeropersona;
    }
    
    public function __destruct() {
        return self::$numeropersona--;
    }
    
    // a todos los que clone se les pone la edad 0
    public function __clone() {
        $this->edad=0;
    }
            
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name, $value) {
        $this->$name=$value;
    }
    
    function __toString() {
        return "Soy " .$this->nombre. " ".$this->apell. " y tengo ". $this->edad. " años.";
    }
    
    function __call($name, $arguments) {
        if($name == "muestra"){
            if(count($arguments)==1){
                $this->nombre=$arguments[0];
            }
            if(count($arguments)==2){
                $this->nombre=$arguments[0];
                $this->apell=$arguments[1];
            }
        }
    }
    

}

