<?php
require_once '../Modelo/Usuario.php';
require_once '../Modelo/conexion.php';

class ControladorUsuario {
    
    public static function buscarUsuario($nombre, $password, &$errores){
        try{
            $conex = new Conexion();
            //$result = $conex->query("SELECT * FROM usuarios WHERE nombre='$_POST[nombre]' and password='" . md5($_POST["pass"]) . "'");
            $result = $conex->prepare("SELECT * FROM usuarios WHERE nombre=? and password=?");
            $password = md5($password);
            $result->execute([$nombre, $password]);
            if($result->rowCount()){
                $usuario = $result->fetchObject();
                return new Usuario($usuario->nombre, $usuario->password);
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc){
            $errores[]=$exc->getMessage();
           
        }
    }
}

