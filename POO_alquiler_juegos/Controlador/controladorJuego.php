<?php
require_once './Modelo/Juegos.php';
require_once './Modelo/conexion.php';

class controladorProducto{
    
    public static function insertar(Juegos $j){
         try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO juegos (Codigo,Nombre_juego,Nombre_consola,Anno,Alguilado,Precio,Imagen) VALUES ('$j->codigo','$j->nombre_juego','$j->nombre_consola','$j->anno','$j->precio', '$j->alquilado', '$j->imagen')");
            // si queremos que devuelva algo return;
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            header('Location:index.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
    public static function buscarProducto($codigo) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos WHERE codigo='$codigo'");
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $j = new Juegos($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio,$registro->Alguilado,$registro->Imagen);
                // como es un objeto de la misma clase se puede hacer así
                return $j;
            } else
                return false;
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            //header('Location:index.php');
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function recuperarTodos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos");
            if ($result->rowCount()) {
                //creo un producto
                //$p = new Producto();
                while ($row = $result->fetchObject()) {
                    $j = new Juegos($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio,$row->Alguilado,$row->Imagen);
                    $juegos[] = clone($j);                   
                }

                return $juegos;
            } else
                return false;
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            header('Location:index.php');
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
}

