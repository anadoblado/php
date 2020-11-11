
<!-- comprobar usuario -->

<html>
    <head>
        <title>Formulario</title>
    </head>
    <body>
      <?php
        
        if (isset($_POST["enviar"])) {

            if (preg_match('/^[a-z]{1,30}$/i', $_POST['nombre']) 
                    && preg_match('/^[0-9]{8}[a-z]{1}$/i', $_POST['dni']) 
                    && preg_match('/^\d{2}-\d{2}-\d{4}$/', $_POST['fecha_nac']) 
                    && $_POST['edad'] > 18 && !preg_match('/^\d{3}/', $_POST['edad'])) {
                echo '<h3>Formulario</h3>';
                echo 'Nombre: ' . $_POST['nombre'] . '<br>';
                echo 'DNI: ' . $_POST['dni'] . '<br>';
                echo 'Fecha de nacimiento: ' . $_POST['fecha_nac'] . '<br>';
                echo 'Edad: ' . $_POST['edad'] . '<br>';
                
                 ?>
        <form action="ejercicio3Apuntes.php">
            <input type="submit" value="Volver">>
        </form>
                     <?php
            } else {
                ?>
  

        <h2>Campos incorrectos, revisa la información</h2>
         <form action="ejercicio3Apuntes.php">
             <input type="submit" value="Volver">
        </form>
                
<?php
            }
        }else{ ?>
            
             <form action="" method="post">
                    Nombre: <input type="text" name="nombre"><br>
                    DNI: <input type="text" name="dni"><br>
                    Fecha de nacimiento <input type="text" name="fecha_nac"><br>
                    Edad: <input type="text" name="edad"><br>
                    <input type="submit" name="enviar" value="Comprobar"><br>  
                </form>
            
            <?php
            
            
        }
        ?>

    </body>
</html>


