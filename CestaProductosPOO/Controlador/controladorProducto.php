<?php

require_once './Modelo/conexion.php';
require_once './Modelo/Producto.php';

class controladorPruducto {

    public static function insertar(Producto $p) {
        try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO productos (codigo,nombre,precio) VALUES ('$p->codigo','$p->nombre','$p->precio')");
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
            $result = $conex->query("SELECT * FROM productos WHERE codigo=$cod");
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $p = new Producto($registro->codigo, $registro->nombre, $registro->precio);
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

    public static function recuperarTodos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM productos");
            if ($result->rowCount()) {
                //creo un producto
                $p = new Producto();
                while ($row = $result->fetchObject()) {
                    // le asigono esos valores y los meto en el array
                    $p->nuevoProducto($row->codigo, $row->nombre, $row->precio);

                    // otra forma de crearlo, así hace 3 objetos en distintas direcciones de memoria, no haec falta crear el new Producto() fuera
                    //$p= new self($row->codigo, $row->nombre, $row->precio);
                    // con los objetos se asigna la misma dirección de memoria si sólo ponemos $productos[]=$p;
                    // por eso usamos clone();
                    $productos[] = clone($p);
                    $p = new Producto($row->codigo, $row->nombre, $row->precio);
                }
                //$registro=$result->fetchObject();
                // como es un objeto de la misma clase se puede hacer así
                //return new self($registro->codigo, $registro->nombre, $registro->precio);
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
