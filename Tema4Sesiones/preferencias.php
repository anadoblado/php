<?php
    session_start();
    echo session_id();
    echo "<br>";
    echo session_name();
    //$_SESSION['idioma'] = $_POST['idioma'];
    //$_SESSION['perfil'] = $_POST['perfil'];
    //$_SESSION['zonaHoraria'] = $_POST['zonaHoraria'];
    
    if(isset($_POST['enviar'])){
        $_SESSION['idioma'] = $_POST['idioma'];
        $_SESSION['perfil'] = $_POST['perfil'];
        $_SESSION['zonaHoraria'] = $_POST['zonaHoraria'];
    }
?>

<html>
    <head>
        <title>Preferencias</title>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    </head>
    <body>
        <fieldset>
             <legend>Preferencias</legend>
             <div class="campo">
            <form action="" method="post">
               
                <?php
                if(isset($_POST['enviar'])){
                    echo '<span class='."mensaje".'>Información guardada en la sesión</span><br>' ;
                }
                ?>
                <label class="etiqueta">Idioma</label><br>
                <select id="id" name="idioma">
                    <?php 
                        $idiomas = ["Inglés", "Español"];
                        foreach ($idiomas as $idioma){
                            ?>
                    <option value="<?php echo $idioma; ?>" 
                            <?php
                                if (isset($_SESSION['idioma']) && $_SESSION['idioma'] == $idioma)  echo 'selected';
                            ?> ><?php echo $idioma; ?></option>
                                <?php
                        }
                    ?>
                </select><br><br>

                <label class="etiqueta">Perfil público</label><br>
                <select id="id" name="perfil">
                     <?php 
                        $perfil = ["Sí", "NO"];
                        foreach ($perfil as $value){
                            ?>
                    <option value="<?php echo $value; ?>" 
                            <?php
                                if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == $value)  echo 'selected';
                            ?> ><?php echo $value; ?></option>
                                <?php
                        }
                    ?>
                </select><br><br>

                <label class="etiqueta">Zona horaria</label><br>
                <select id="id" name="zonaHoraria">
                     <?php 
                        $zonaHoraria = ["GMT-2", "GMT-1","GMT", "GMT+1", "GMT+2" ];
                        foreach ($zonaHoraria as $value){
                            ?>
                    <option value="<?php echo $value; ?>" 
                            <?php
                                if (isset($_SESSION['zonaHoraria']) && $_SESSION['zonaHoraria'] == $value)  echo 'selected';
                            ?> ><?php echo $value; ?></option>
                                <?php
                        }
                    ?>
                </select><br><br>
                
                <br><!-- comment -->
                <input type="submit" name="enviar" value="Establecer preferencias">
                 <br><!-- comment -->
                <a href="mostrar.php">Mostrar preferencias</a>

            </form>
        </div>
        </fieldset>
       
    </body>
</html>

