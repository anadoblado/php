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
            <?php
            try {
                 $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
            $error = $conex->errorInfo();
            echo $error[2];
                ?>  
                <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                     Familia: <select name="familia">
                        <?php
                        $familia = $conex->query("SELECT * FROM familia");
                        while ($obj = $familia->fetch(PDO::FETCH_OBJ)) {
                            echo '<option value="' . $obj->cod . '"';
                            if (!empty($_POST['familia']) && $obj->cod == $_POST['familia']) {
                                echo 'selected';
                            }
                            echo '>' . $obj->nombre . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" name="mostrar" value="Mostrar productos">
                    
                </form>
            </div>


        <div id="contenido">
            <h2>Productos de la familia:</h2>
            <form action="editar.php" method="post">
                <?php 
                    if(!empty($_POST['familia']) && isset($_POST['mostrar'])){
                        $elemento = $_POST['familia'];
                       // $consulta = $conex->query('SELECT ti.nombre, st.unidades, ti.cod FROM stock st JOIN tienda ti WHERE ti.cod=st.tienda AND st.producto="' . $elemento . '"');
                        $consulta = $conex->query('SELECT * FROM producto WHERE familia="' . $elemento . '"');
                    
                         while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
                             echo 'Productos'.$fila->nombre_corto. ' - Precio'.$fila->PVP. '€';
                             echo '<button type="submit" name="editar" value="'.$fila->cod.'">Editar</button><br>';
                         }
                    }
                ?>
            </form>
        </div>
        <?php
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }
    ?>


    <div id="pie">
    </div>
</body>
</html>
