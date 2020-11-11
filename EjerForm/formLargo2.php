<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        if (!empty($_POST['enviar'])) {
            echo'IMPRIMIR FORMULARIO';
            echo '<br>';
            echo 'Nombre: ' . $_POST['nombre'];
            echo '<br>';
            echo 'Apellidos: ' . $_POST['apellidos'];
            echo '<br>';
            echo 'Aficiones: ';
            $arrayAficiones = json_decode($_POST['aficiones']);
            foreach ($arrayAficiones as $aficion => $af) {
                echo $af.'; ';
            }
            echo '<br>';
            echo 'Estudios: ';
            $arrayEstudios = json_decode($_POST['estudios']);
            foreach ($arrayEstudios as $estudio => $es) {
                echo $es.'; ';
            }
            echo '<br>';
            echo 'Sexo: ' . $_POST['sexo'];
            echo '<br>';
            echo 'Estado civil ' . $_POST['estado'];
            echo '<br>';
            echo 'Edad: ' . $_POST['edad'];
            

            }else{
                ?>
            <?php if (!empty($_POST['siguiente'])) { ?>
            
                <form name="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    Sexo
                    <input type="radio" name="sexo" value="hombre"
                    <?php
                    if (isset($_POST['sexo']))
                        echo 'checked="checked"';
                    ?>
                           />
                    Hombre
                    <input type="radio" name="sexo" value="mujer"
                    <?php
                    if (isset($_POST['sexo']))
                        echo 'checked="checked"';
                    ?>
                           />
                    Mujer
                    <p></p>
                    Estado civil: 
                    <input type="radio" name="estado" value="soltero"
                    <?php
                    if (isset($_POST['estado']))
                        echo 'checked="checked"';
                    ?>
                           />
                    Soltero
                    <input type="radio" name="estado" value="casado"
                    <?php
                    if (isset($_POST['sexo']))
                        echo 'checked="checked"';
                    ?>
                           />
                    Casado
                    <input type="radio" name="estado" value="otro"
                    <?php
                    if (isset($_POST['sexo']))
                        echo 'checked="checked"';
                    ?>
                           />
                    Otro
                    <p>
                        Edad: 
                        <select name="edad">
                            <option value="De 1 a 14 años">De 1 a 14 años</option>
                            <option value="De 15 a 25 años">De 15 a 25 años</option>
                            <option value="De 26 a 35 años">De 26 a 35 años</option>
                            <option value="Más de 35 años">Más de 35 años</option>
                        </select>
                        <br>
                        <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
                        <input type="hidden" name="apellidos" value="<?php echo $_POST['apellidos']; ?>">
                        <input type="hidden" name="aficiones" value=<?php echo json_encode($_POST['aficiones']); ?>>
                        <input type="hidden" name="estudios" value=<?php echo json_encode($_POST['estudios']); ?>>
                        <input type="submit" name="enviar" value="Enviar">
                </form>


            <?php } else { ?>
                <form name="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    Introduce el nombre
                    <input type="text" name="nombre" <?php
                    if (!empty($_POST['nombre'])) {
                        echo 'value="' . $_POST['nombre'] . '"';
                    }
                    ?>" /><br>
                    Introduce el apellidos
                    <input type="text" name="apellidos" <?php
                    if (!empty($_POST['aprellidos'])) {
                        echo 'value="' . $_POST['apellidos'] . '"';
                    }
                    ?>" /><br>
                    <p>Aficiones:
                    </p>
                    <input type="checkbox" name="aficiones[]" value="cine"
                    <?php
                    if (isset($_POST['aficiones']) && in_array("cine", $_POST['aficiones']))
                        echo 'checked="checked"';
                    ?>
                           />
                    Cine
                    <input type="checkbox" name="aficiones[]" value="lectura"
                    <?php
                    if (isset($_POST['aficiones']) && in_array("lectura", $_POST['aficiones']))
                        echo 'checked="checked"';
                    ?>
                           />
                    Lectura
                    <input type="checkbox" name="aficiones[]" value="musica"
                    <?php
                    if (isset($_POST['aficiones']) && in_array("musica", $_POST['aficiones']))
                        echo 'checked="checked"';
                    ?>
                           />
                    Musica
                    <br />
                    <input type="checkbox" name="aficiones[]" value="deporte"
                    <?php
                    if (isset($_POST['aficiones']) && in_array("deporte", $_POST['aficiones']))
                        echo 'checked="checked"';
                    ?>
                           />
                    Deporte
                    <input type="checkbox" name="aficiones[]" value="tv"
                    <?php
                    if (isset($_POST['aficiones']) && in_array("tv", $_POST['aficiones']))
                        echo 'checked="checked"';
                    ?>
                           />
                    Televisión<br />
                    <p>Estudios <br />
                        <select multiple name="estudios[]" size="5">
                            <option value="ESO">ESO</option>
                            <option value="bachiller">Bachiller</option>
                            <option value="CFGM">CFGM</option>
                            <option value="CFGS">CFGS</option>
                            <option value="Universidad">Universidad</option>
                        </select>
                    </p> 
                    <input type="submit" name="siguiente" value="Siguiente">
                </form>
                <?php
            }
            ?>
        <?php
        }
        ?>




    </body>
</html>







