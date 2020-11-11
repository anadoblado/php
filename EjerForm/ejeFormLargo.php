<html>
    <head>
        <title>Formulario</title>
    </head>
    <body>
        <?php 
        if((!empty($_POST['nombre']) && !empty($_POST['apellidos'])))
        ?>
        <form name="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Introduce el nombre
                <input type="text" name="nombre" <?php 
                        if (!empty($_POST['nombre'])){
                            echo 'value="'. $_POST['nombre'].'"';
                        }
                        ?>" /><br>
                <?php
                    if (isset($_POST['enviar']) && empty($_POST['nombre']))
                        echo "<span style='color:red'> -> Debe introducir su nombre</span>";
                ?>
            Introduce el apellidos
                <input type="text" name="apellidos" <?php 
                        if (!empty($_POST['aprellidos'])){
                            echo 'value="'. $_POST['apellidos'].'"';
                        }
                        ?>" /><br>
                <?php
                    if (isset($_POST['enviar']) && empty($_POST['apellidos']))
                        echo "<span style='color:red'> -> Debe introducir sus apellidos!</span>";
                ?>
            Edad: 
            <select name="edad">
                <option value="uno">De 1 a 14 años</option>
                <option value="fos">De 15 a 25 años</option>
                <option value="tres">De 26 a 35 años</option>
                <option value="tres">Más de 35 años</option>
            </select>
            <br>
            Sexo
            <?php
                    if (isset($_POST['enviar']) && empty($_POST['sexo']))
                        echo "<span style='color:red'> -> Debe introducir una opción</span>";
                    
                ?>
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
            <?php
                    if (isset($_POST['enviar']) && empty($_POST['estado']))
                        echo "<span style='color:red'> -> Debe introducir una opción</span>";
                    
                ?>
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
                <p></p>
                <p>Aficiones:
                <?php
                    if (isset($_POST['enviar']) && empty($_POST['aficiones']))
                        echo "<span style='color:red'> -> Debe escoger al menos uno!!</span>";
                    ?>
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
                       if (isset($_POST['aficiones']) && in_array("dv", $_POST['aficiones']))
                           echo 'checked="checked"';
                       ?>
                       />
                Televisión<br />
                <p>Estudios <br />
                <select multiple name="estudios" size="5">
                    <option value="ESO">ESO</option>
                    <option value="bachiller">Bachiller</option>
                    <option value="CFGM">CFGM</option>
                    <option value="CFGS">CFGS</option>
                    <option value="Universidad">Universidad</option>
                </select>
                </p>    
        </form>
    </body>
</html>


<?php ?>



