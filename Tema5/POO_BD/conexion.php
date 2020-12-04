<?php

class Conexion extends PDO{
   private $dsn = "mysql:host=localhost;dbname=objetos_bd;charset=utf8mb4";
   private $usu="dwes";
   private $pass="abc123.";
   private $opciones=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
   
   public function __construct() {
       parent::__construct($this->dsn, $this->usu, $this->pass, $this->opciones);
   }
}


