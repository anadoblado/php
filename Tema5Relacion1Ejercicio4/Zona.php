<?php

class Zona {
    
    private $nombre_zona;
    private $plazas_totales;
    private $plazas_restantes;
    
    function __construct($nombre_zona, $plazas_totales, $plazas_restantes) {
        $this->nombre_zona = $nombre_zona;
        $this->plazas_totales = $plazas_totales;
        $this->plazas_restantes = $plazas_restantes;
    }

    function __get($name) {
        return $this->$name;
    }
    
    function __set($name, $value) {
        $this->$name = $value;
    }
    
    function __toString() {
        return "Zona ".$this->nombre_zona.": ".$this->plazas_restantes." de ".$this->plazas_totales." entradas.";
    }
    
}

