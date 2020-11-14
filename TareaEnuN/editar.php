<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Plantilla para Ejercicios Tema 3</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <div id="encabezado">
            <h1>Tarea: Edición del producto </h1>
            <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <!--<input type="type" name="name" value="<?php echo $_POST["editar"] ?>"> 
                así compruebo que me traigo el código hasta este formulario -->
            </form>
        </div>

        <div id="contenido">
            <h2>Producto</h2>
            <?php
            try {
                $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
                $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
                $error = $conex->errorInfo();
                echo $error[2];
                ?> 
            <form action="actualizar.php" method="post">
                <?php 
                    $cod = $_POST["editar"];
                    $caracteristicas = $conex->query('SELECT * FROM producto WHERE cod="'.$cod.'"');
                    while ($obj = $caracteristicas->fetch(PDO::FETCH_OBJ)){
                        ?>
                <label>Nombre corto</label>
                <input type="text" name="nombre_corto" value="<?php echo $obj->nombre_corto ?>" size="50"><br>
                <label> Nombre</label>
                <input type="text" name="nombre" value="<?php echo $obj->nombre ?>"><!-- comment --><br>
                <label>Descripcion</label><br>
                <textarea id="id" name="descripcion" rows="10" cols="50"><?php echo $obj->descripcion ?></textarea><br>
                PVP <input type="text" name="precio" value="<?php echo $obj->PVP ?>"><br>
                
                <button type="submit" name="actualizar" value="<?php echo $obj->cod ?>">Actualizar</button>
                <input type="submit" value="Cancelar" name="cancelar" />
                <?php 
                    }
                ?>
            </form>
                <?php
            } catch (PDOException $exc) {
                echo $exc->getTraceAsString(); // error de php
                echo 'Error:' . $exc->getMessage(); // error del servidor de bd
            }
            ?>
        </div>

        <div id="pie">
        </div>
    </body>
</html><!-- comment -->
