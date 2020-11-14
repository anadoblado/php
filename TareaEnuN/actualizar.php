<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Plantilla para Ejercicios Tema 3</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <div id="encabezado">
            <h1>Tarea: Listado de productos de una familia </h1>
            <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <!--<input type="type" name="name" value="<?php echo $_POST["actualizar"] ?>"> -->
                <?php
                if (isset($_POST['actualizar'])) {
                    try {
                        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
                        $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
                        $error = $conex->errorInfo();
                        echo $error[2];
                        $codigo = $_POST['actualizar'];
                        $consulta = $conex->prepare('UPDATE producto SET nombre=?, nombre_corto=?, descripcion=?, PVP=? WHERE cod="'.$codigo.'"');
                        $nombre = $_POST['nombre'];
                        $nombre_corto = $_POST['nombre_corto'];
                        $descripcion = $_POST['descripcion'];
                        $precio = $_POST['precio'];
                        $consulta->bindParam(1, $nombre);
                        $consulta->bindParam(2, $nombre_corto);
                        $consulta->bindParam(3, $descripcion);
                        $consulta->bindParam(4, $precio);
                        $consulta->execute();
                          //header('Location: listado.php');
                        ?>
                 </form>
                <form action="listado.php" method="post">
                    <h4>Datos actualizados de forma correcta</h4>
                     <input type="submit" value="Continuar" name="volver"  />       
                </form>
                <?php
                    } catch (PDOException $exc) {
                        echo $exc->getTraceAsString(); // error de php
                        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
                    }
                }
                if(isset($_POST['cancelar'])){
                     header('Location: listado.php');
                }
                ?>
           
        </div>

        <div id="contenido">
            <h2>Contenido</h2>
        </div>

        <div id="pie">
        </div>
    </body>
</html>

