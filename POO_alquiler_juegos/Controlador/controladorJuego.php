<?php
require_once './Modelo/Juegos.php';
require_once './Modelo/conexion.php';

class controladorJuego{
    
    public static function insertar(Juegos $j){
         try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO juegos (Codigo,Nombre_juego,Nombre_consola,Anno,Precio,Alguilado,Imagen,Descripcion) VALUES ('$j->codigo','$j->nombre_juego','$j->nombre_consola','$j->anno','$j->precio', '$j->alquilado', '$j->imagen','$j->descripcion')");
            // si queremos que devuelva algo return;
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            header('Location:index.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
    public static function buscarJuego($codigo) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos WHERE codigo='$codigo'");
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $j = new Juegos($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio,$registro->Alguilado,$registro->Imagen, $registro->descripcion);
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
                //creo un juego

                while ($row = $result->fetchObject()) {
                    $j = new Juegos($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio,$row->Alguilado,$row->Imagen, $row->descripcion);
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
    
    public function recuperarAlquiladosUsuario($dni) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos, alquiler where Cod_juego=Codigo AND DNI_cliente='$dni' AND Alguilado='SI'");              
            return $result;
           
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
      }

      public static function recuperarNoAlquilados() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos where Alguilado='NO'");
            if ($result->rowCount()) {
                //creo un producto
                
                while ($row = $result->fetchObject()) {
                    
                     $j = new Juegos($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio, $row->Alguilado, $row->Imagen);
                     $juegos[] = clone($j);   
                }
                 return $juegos;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
      }
      
      public function eliminarJuego($codigo) {
        try {
            $conex = new Conexion();
            $conex->exec("DELETE from juegos where Codigo='$codigo'");
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            echo 'no inserto';
            //header('Location:vistaCliente.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($result);
        unset($conex);
    }

    public function modificarJuego(Juegos $juego) {
        try {
            $conex = new Conexion();
            $conex->exec("UPDATE juegos SET Anno='$juego->anno', Precio='$juego->precio', Imagen='$juego->imagen', descripcion='$juego->descripcion' WHERE Codigo='$juego->codigo'");
            
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            echo 'no inserto';
            //header('Location:vistaCliente.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($result);
        unset($conex);
    }

      
}

