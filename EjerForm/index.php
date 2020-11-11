<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio</title>
    </head>
    <body>
        <?php
        if (!empty($_POST['modulos']) && !empty($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $modulos = $_POST['modulos'];
            print "Nombre: ".$nombre."<br />";
            foreach ($modulos as $modulo) {
                print "Modulo: ".$modulo."<br />";  
            }
        } else {
            ?>
            <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                Nombre del alumno:
                <input type="text" name="nombre" value="<?php 
                        if (!empty($_POST['nombre'])){
                            echo $_POST['nombre'];
                        }
                    ?>" />
                <?php
                    if (isset($_POST['enviar']) && empty($_POST['nombre']))
                        echo "<span style='color:red'> -> Debe introducir un nombre!!</span>";
                ?>
                <br />
                <p>Módulos que cursa:
                <?php
                    if (isset($_POST['enviar']) && empty($_POST['modulos']))
                        echo "<span style='color:red'> -> Debe escoger al menos uno!!</span>";
                    ?>
                </p>
                <input type="checkbox" name="modulos[]" value="DWES"
                    <?php
                    if (isset($_POST['modulos']) && in_array("DWES", $_POST['modulos']))
                        echo 'checked="checked"';
                    ?>
                />
                Desarrollo web en entorno servidor
                <br />
                <input type="checkbox" name="modulos[]" value="DWEC"
                       <?php
                       if (isset($_POST['modulos']) && in_array("DWEC", $_POST['modulos']))
                           echo 'checked="checked"';
                       ?>
                       />
                Desarrollo web en entorno cliente<br />
                <br />
                <input type="submit" value="Enviar" name="enviar"/>
            </form>
                <?php
                   }
                ?>
        <a href="">Volver al formulario</a>
    </body>
</html>
