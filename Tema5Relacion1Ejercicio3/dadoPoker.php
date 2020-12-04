<?php

class DadoPoker{
    protected static $caras = array ('As', 'K', 'Q', 'J', '8', '7');
    protected static $tiradas = 0;
    
//    function __construct($caras) {
//        $this->caras = $caras;
//    }
    
    public function tirar(){
        $valorTirada = random_int(0, 5);
        $caraDeLaTirada = self::$caras[$valorTirada];
        self::$tiradas++;
        return $caraDeLaTirada;
    }
    
    static function getTiradas() {
        return self::$tiradas;
    }

    static function setTiradas($tiradas): void {
        self::$tiradas = $tiradas;
    }



}

