<?php
class Cuenta{
    private $iban;
    private $saldo;
    private $dni_cuenta;
    
    function __construct($iban="", $saldo="", $dni_cuenta="") {
        $this->iban = $iban;
        $this->saldo = $saldo;
        $this->dni_cuenta = $dni_cuenta;
    }
    
    public function nuevaCuenta($iban, $saldo, $dni_cuenta){
        $this->iban = $iban;
        $this->saldo = $saldo;
        $this->dni_cuenta = $dni_cuenta;
    }

     public function __get($name) {
        return $this->$name;
    }
    
     public function __set($name, $value) {
        $this->$name=$value;
    }
    
    public function __toString() {
        return "Iban:" . $this->iban . " saldo: ".$this->saldo;
    }
}
?>

