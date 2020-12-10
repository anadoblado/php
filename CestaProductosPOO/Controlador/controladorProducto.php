<?php
require_once '../Modelo/conexion.php';
require_once '../Modelo/Producto.php';

class controladorPruducto {

    public static function insertar(Producto $p) {
        try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO producto (codigo,nombre,precio) VALUES ('$p->codigo','$p->nombre','$p->precio')");
            // si queremos que devuelva algo return;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }

    // los métodos estáticos son para no tener que crear el objeto producto cada vez, lo uso sin crear el objeto
    public static function buscarProducto($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM producto WHERE cod='$cod'");
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $p = new Producto($registro->cod, $registro->nombre_corto, $registro->descripcion, $registro->PVP);
                // como es un objeto de la misma clase se puede hacer así
                return $p;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function addCesta($cod){
        $p = self::buscarProducto($cod);
        $productosCesta [] = clone($p); 
        return $productosCesta;
    }

    public static function recuperarTodos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM producto");
            if ($result->rowCount()) {
                //creo un producto
                //$p = new Producto();
                while ($row = $result->fetchObject()) {
                    $p = new Producto($row->cod, $row->nombre_corto, $row->descripcion, $row->PVP);
                    $productos[] = clone($p);                   
                }

                return $productos;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }

}
