<?php

require_once './Modelo/conexion.php';
require_once './Modelo/Cliente.php';

class controladorCliente{
    public static function insertar(Cliente $c){
         try {
            $conex = new Conexion();
            $pass= md5($c->clave);
            $conex->exec("INSERT INTO clinte (DNI,Nombre,Apellidos,Direccion,Localidad,Clave,Tipo) VALUES ('$c->dni','$c->nombre','$c->apellidos','$c->direccion','$c->localidad', '$pass', '$c->tipo')");
            // si queremos que devuelva algo return;
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            //header('Location:index.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
    public static function buscarCliente($dni,$clave,&$errores) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("SELECT * FROM cliente WHERE DNI=? and Clave=?");
            $clave = md5($clave);
            $result->execute([$dni, $clave]);
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $c = new Cliente($registro->DNI, $registro->Nombre, $registro->Apellidos, $registro->Direccion, $registro->Localidad,$registro->Clave,$registro->Tipo);
                // como es un objeto de la misma clase se puede hacer así
                return $c;
            } 
            unset($result);
            unset($conex);
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            
            //die('error con la base de datos' . $ex->getMessage());
             $errores[]=$exc->getMessage();
        }
        unset($conex);
    }
    
    public static function recuperarTodos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cliente");
            if ($result->rowCount()) {
                //creo un producto
                //$p = new Producto();
                while ($row = $result->fetchObject()) {
                    $c = new Cliente($row->DNI, $row->Nombre, $row->Apellidos, $row->Direccion, $row->Localidad,$row->Clave,$row->Tipo);
                    $clientes[] = clone($c);                   
                }

                return $clientes;
            } else
                return false;
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            //header('Location:index.php');
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
}

