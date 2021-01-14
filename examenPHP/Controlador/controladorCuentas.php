<?php

require_once './Modelo/conexion.php';
require_once './Modelo/Cuenta.php';

class controladorCuentas{
    public static function cuentasDelUsuario($dni) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cuentas WHERE dni_cuenta='$dni'");
              
            return $result;
           
        } catch (PDOException $ex) {
            echo '<a href=inicio_cliente.php>---Ir a inicio---</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function verSaldo($dni,$iban){
        try{
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cuentas WHERE dni_cuenta='$dni' and iban='$iban'");
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $c = new Cuenta($registro->iban, $registro->saldo, $registro->dni_cuenta);
  
                return $c;
            }
        } catch (PDOException $ex) {
            echo '<a href=inicio_cliente.php>---Ir a inicio---</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    public static function verCuentaConUsuario(){
        try {
             $conex = new Conexion();
             $result = $conex->query("SELECT * FROM cuentas, usuarios WHERE dni_cuenta=DNI");
             return $result;
        }catch (PDOException $ex) {
            echo '<a href=inicio_cliente.php>---Ir a inicio---</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function restarSaldo(Cuenta $c){
        try {
            $conex = new Conexion();
            $conex->exec("UPDATE cuentas SET saldo='$c->saldo', dni_cuenta='$c->dni_cuenta' WHERE iban='$c->iban'");
            
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            echo 'no inserto';
            die('error con la base de datos');
            //mata el programa
        }
        unset($result);
        unset($conex);
    }
   public static function sumarSaldo($iban, $saldo){
        try {
            $conex = new Conexion();
            $conex->exec("UPDATE cuentas SET saldo='$saldo' WHERE iban='$iban'");
            
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            echo 'no inserto';
            die('error con la base de datos');
            //mata el programa
        }
        unset($result);
        unset($conex);
    }
}

