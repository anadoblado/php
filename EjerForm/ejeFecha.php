<html>
    <head>
        <title>Fecha</title>
    </head>
    <body>
        <?php
        require_once 'funciones.php';
            if(!empty($_POST['dia']) && !empty($_POST['mes']) && !empty($_POST['year'])){
                $dia = $_POST['dia'];
                $mes = $_POST['mes'];
                $year = $_POST['year'];
                if(checkdate($mes, $dia, $year)){
                    fecha(mktime(0, 0, 0, $dia, $mes, $year));
                }else{
                     echo "<span style='color:red'> -> Fecha no válida</span>";
                }
            } else {
                ?>
                <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                Introduce el día
                <input type="text" name="dia" <?php 
                        if (!empty($_POST['dia'])){
                            echo 'value="'. $_POST['dia'].'"';
                        }
                    ?>" />
                <?php
                    if (isset($_POST['enviar']) && empty($_POST['dia']))
                        echo "<span style='color:red'> -> Debe introducir un dia!!</span>";
                ?>
                Introduce el mes
                <input type="text" name="mes" <?php 
                        if (!empty($_POST['mes'])){
                            echo 'value="'. $_POST['mes'].'"';
                        }
                    ?>" />
                <?php
                    if (isset($_POST['enviar']) && empty($_POST['mes']))
                        echo "<span style='color:red'> -> Debe introducir un mes</span>";
                ?>
                Introduce el año
                <input type="text" name="year" <?php 
                        if (!empty($_POST['year'])){
                            echo 'value="'. $_POST['year'].'"';
                        }
                    ?>" />  
                <?php
                    if (isset($_POST['enviar']) && empty($_POST['year']))
                        echo "<span style='color:red'> -> Debe introducir un año</span>";
                ?>
            <input type="submit" value="Enviar" name="enviar"/>
        </form>
        <?php
            }
        ?>
    </body>
</html>







