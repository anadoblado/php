<?php

class Juegos {

    private $codigo;
    private $nombre_juego;
    private $nombre_consola;
    private $anno;
    private $precio;
    private $alquilado;
    private $imagen;
    private $descripcion;

    public function __construct($codigo = "", $nombre_juego = "", $nombre_consola = "", $anno = "",$precio="", $alquilado = "", $imagen = "", $descripcion="") {
        $this->codigo = $codigo;
        $this->nombre_juego = $nombre_juego;
        $this->nombre_consola = $nombre_consola;
        $this->anno = $anno;
        $this->precio = $precio;
        $this->alquilado = $alquilado;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
    }

    public function nuevoJuego($codigo, $nombre_juego, $nombre_consola, $anno, $precio, $alquilado, $imagen, $descripcion) {
        $this->codigo = $codigo;
        $this->nombre_juego = $nombre_juego;
        $this->nombre_consola = $nombre_consola;
        $this->anno = $anno;
        $this->precio = $precio;
        $this->alquilado = $alquilado;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }

    public function __toString() {
        return "Codigo: ".$this->codigo." nombre: " .$this->nombre_juego;
    }
}
