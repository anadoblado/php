<?php

// ya está en producto 
require_once 'conexion.php';
require_once 'Producto.php';

// hago una clase de conexión dode ya está creada con los parámetros
$conex = new Conexion();

$p=new Producto();
//$p->nuevoProducto(2, "camisa", 20);
//$p->insertar();
//
//$p->nuevoProducto(3, "jersey", 20);
//$p->insertar();

//$p=Producto::buscarProducto(2);
//echo $p;

$productos = Producto::recuperarTodos();
foreach ($productos as $valor){
    echo "Código: ".$valor->codigo." nombre ".$valor->nombre. " precio: ".$valor->precio."<br>";
}



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

