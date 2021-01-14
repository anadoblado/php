<?php

require_once './Modelo/conexion.php';
require_once './Modelo/Usuario.php';

class controladorUsuario{
    
    public static function insertar(Usuario $u){
        try {
            $conex = new Conexion();
            $pass= md5($u->clave);
            $conex->exec("INSERT INTO usuarios (Nombre, Direccion, Telefono, DNI, clave, intentos, bloqueado) VALUES ('$u->nombre','$u->direccion','$u->telefono','$u->dni', '$pass', '$u->intentos', '$u->bloqueado')");
            // si queremos que devuelva algo return;
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            //header('Location:index.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
        
    }
    
    public static function buscarUsuario($dni,$clave,&$errores) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("SELECT * FROM usuarios WHERE DNI=? and clave=?");
            $clave = md5($clave);
            $result->execute([$dni, $clave]);
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $u = new Usuario($registro->Nombre, $registro->Direccion, $registro->Telefono, $registro->DNI, $registro->clave,$registro->intentos,$registro->bloqueado);
  
                return $u;
            } 
            unset($result);
            unset($conex);
        } catch (PDOException $ex) {
             $errores[]=$exc->getMessage();
        }
        unset($conex);
    }
}

