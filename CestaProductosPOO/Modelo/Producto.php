<?php

class Producto {

    public $codigo;
    public $nombre_corto;
    public $descripcion;
    public $PVP;

    public function __construct($codigo, $nombre_corto, $descripcion, $PVP) {
        $this->codigo = $codigo;
        $this->nombre_corto = $nombre_corto;
        $this->descripcion = $descripcion;
        $this->PVP = $PVP;
    }

   public function getCodigo() {
        return $this->codigo;
    }

    function getNombre_corto() {
        return $this->nombre_corto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPVP() {
        return $this->PVP;
    }

    function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    function setNombre_corto($nombre_corto): void {
        $this->nombre_corto = $nombre_corto;
    }

    function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    function setPVP($PVP): void {
        $this->PVP = $PVP;
    }
 

    public function __toString() {
         return "Codigo: ".$this->codigo." nombre_corto: " .$this->nombre_corto. " descripcion: ".$this->descripcion." precio: ".$this->PVP;
    }


}
