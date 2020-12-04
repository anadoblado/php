<?php
require_once 'Vehiculo.php';
class Bicicleta extends Vehiculo{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function anda($km){
        echo 'Voy a pedalear ' . $km . ' kilómetros <br>';
        parent::aumentoKm($km);
        echo 'He recorrido '.$this->getKmRecorridos(). ' kilómetros <br>';
    }
    
    public function hacerCaballito() {
        echo 'Yo hago caballitos!!<br>';
    }
    
}

