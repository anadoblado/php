<?php
class Vehiculo{
    //atributo de clase
protected static $cantidad = 0;
protected static $kmTotales = 0;

//atributo de instancia
protected $kmRecorridos;
//protected $modelo;
//protected $color;

function __construct() {
//    $this->modelo = $modelo;
//    $this->color = $color;
    $this->kmRecorridos = 0;
    self::$cantidad++;
}
//function getModelo() {
//    return $this->modelo;
//}
//
//function getColor() {
//    return $this->color;
//}
//
//function setModelo($modelo): void {
//    $this->modelo = $modelo;
//}
//
//function setColor($color): void {
//    $this->color = $color;
//}


//function __get($name) {
//    return $this->$name;
//}
//
//function __set($name, $value) {
//    $this->$name=$value;
//}
//
//function __toString() {
//    return "El vehículo " .$this->$modelo." es de color ".$this->$color;
//}

// método  de clase
static function getCantidad() {
    return self::$cantidad;

    
}
// método  de clase
static function getKmTotales() {
    return self::$kmTotales;
}

// método de instancia
function getKmRecorridos() {
    return $this->kmRecorridos;
}

// método  de clase
static function setCantidad($cantidad): void {
    self::$cantidad = $cantidad;
}

// método  de clase
static function setKmTotales($kmTotales): void {
    self::$kmTotales = $kmTotales;
}

// método de instancia
function setKmRecorridos($kmRecorridos): void {
    $this->kmRecorridos = $kmRecorridos;
}

public function anda ($kms){
    echo 'Me muevo '. $kms . ' kms<br>';
    self::aumentoKm($kms);
    echo 'Ya he recorrido '. $this->kmRecorridos . ' kilómetros <br>';
}

public function aumentoKm($kms){
    $this->kmRecorridos += $kms;
    self::$kmTotales += $kms;
}



}



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

