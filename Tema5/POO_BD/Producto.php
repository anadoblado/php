<?php

require_once 'conexion.php';
class Producto {
    private $codigo;
    private $nombre;
    private $precio;
    
//    public function __construct($codigo, $nombre, $precio) {
//        $this->codigo = $codigo;
//        $this->nombre = $nombre;
//        $this->precio = $precio;
//    }

    public function __construct($cod="", $nom="", $pre=""){
        $this->codigo=$cod;
        $this->nombre=$nom;
        $this->precio=$pre;
    }
    
    public function nuevoProducto($cod, $nom, $pre) {
        $this->codigo=$cod;
        $this->nombre=$nom;
        $this->precio=$pre;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
    
    public function __toString() {
        return "Codigo: ".$this->codigo." nombre: " .$this->nombre. " precio ".$this->precio;
    }
    
    public function insertar(){
        try{
            $conex = new Conexion();
            $conex->exec("INSERT INTO productos (codigo,nombre,precio) VALUES ('$this->codigo','$this->nombre','$this->precio')");
           // si queremos que devuelva algo return;
        } catch (Exception $ex){
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    // los métodos estáticos son para no tener que crear el objeto producto cada vez, lo uso sin crear el objeto
    public static function buscarProducto($cod) {
        try{
           $conex = new Conexion();
           $result = $conex->query("SELECT * FROM productos WHERE codigo=$cod");
           if($result->rowCount()){
               $registro=$result->fetchObject();
               // como es un objeto de la misma clase se puede hacer así
               return new self($registro->codigo, $registro->nombre, $registro->precio);
           }else return false;
        }catch (PDOException $ex){
            echo '<a href=index.php>Ir a inicio</a>';
        die('error con la base de datos'.$ex->getMessage());
        
        }
        
    }
    
    public static function recuperarTodos() {
        try{
           $conex = new Conexion();
           $result = $conex->query("SELECT * FROM productos");
           if($result->rowCount()){
               //creo un producto
               $p=new Producto();
               while($row=$result->fetchObject()){
                   // le asigono esos valores y los meto en el array
                   $p->nuevoProducto($row->codigo, $row->nombre, $row->precio);
                   
                   // otra forma de crearlo, así hace 3 objetos en distintas direcciones de memoria, no haec falta crear el new Producto() fuera
                   //$p= new self($row->codigo, $row->nombre, $row->precio);
                   
                   
                   // con los objetos se asigna la misma dirección de memoria si sólo ponemos $productos[]=$p;
                   // por eso usamos clone();
                   $productos[]=clone($p);
                   $p= new self($row->codigo, $row->nombre, $row->precio);
               }
               //$registro=$result->fetchObject();
               // como es un objeto de la misma clase se puede hacer así
               //return new self($registro->codigo, $registro->nombre, $registro->precio);
               return $productos;
           }else return false;
        }catch (PDOException $ex){
            echo '<a href=index.php>Ir a inicio</a>';
        die('error con la base de datos'.$ex->getMessage());
        
        }
    }
    
  
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

