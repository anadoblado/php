<?php

require_once './Controlador/controladorProducto.php';

//$p = new Producto(5, "vaqueros", 70);
//controladorPruducto::insertar($p);
//echo controladorPruducto::buscarProducto(1);
$productos = controladorPruducto::recuperarTodos();
foreach ($productos as $valor){
    echo "Código: ".$valor->codigo." nombre ".$valor->nombre. " precio: ".$valor->precio."<br>";
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

