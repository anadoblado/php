<?php
session_start();
//if (!isset($_SESSION['user'])) {
//    header("location:index.php");
//}

//if ( $_SESSION['intentos'] == 0){
//    header("location:intentos.php");
//}
$nombre = false;
$apellido = false;
$direccion = false;
$localidad = false;
$mail = false;
$pass = false;
if(isset($_POST['enviar']) && $nombre && $apellido && $direccion && $localidad && $mail && $pass 
        && !empty($_POST['color_letra']) && !empty($_POST['color_fondo']) && !empty($_POST['letra']) && !empty($_POST['tamaño']) ){
    
}else{
    ?>
        <html>
    <head>
        <title>Registro</title>
    </head>
    <body>
        <form action="" method="post">
            Nombre:<input type="text" name="nombre" <?php
            if (!empty($_POST['nombre'])) {
                echo 'value="' . $_POST['nombre'] . '"';
            }
            ?>/>
                          <?php
                          if (isset($_POST['enviar'])){
                              if(!preg_match("/^[a-z]{1,50}$/i", $_POST["nombre"])){
                              echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";    
                              }else{
                                  $nombre = true;
                              }
                          }
                          ?><br>
                          
            Apellido:<input type="text" name="apellido" <?php
            if (!empty($_POST['apellido'])) {
                echo 'value="' . $_POST['apellido'] . '"';
            }
            ?>/>
                            <?php
                            if (isset($_POST['enviar'])){
                                if(!preg_match("/^[a-z]{1,50}$/i", $_POST["apellido"])){
                                     echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";
                                }else{
                                    $apellido = true;
                                }
                            } 
                               
                            ?><br>
            Dirección:<input type="text" name="direccion" <?php
            if (!empty($_POST['direccion'])) {
                echo 'value="' . $_POST['direccion'] . '"';
            }
            ?>/>
                             <?php
                             if (isset($_POST['enviar'])){
                                 if(!preg_match("/^[a-z]{1,50}$/i", $_POST["direccion"])){
                                     echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";
                                 }else{
                                     $direccion = true;
                                 }
                             }
                                 
                             ?><br>
            Localidad:<input type="text" name="localidad" <?php
            if (!empty($_POST['localidad'])) {
                echo 'value="' . $_POST['localidad'] . '"';
            }
            ?>/>
                             <?php
                             if (isset($_POST['enviar'])){
                                 if(!preg_match("/^[a-z]{1,50}$/i", $_POST["localidad"])){
                                 echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";    
                                 }else{
                                     $localidad = true;
                                 }
                             }
                                 
                             ?><br>
            Email:<input type="text" name="email" <?php
            if (!empty($_POST['email'])) {
                echo 'value="' . $_POST['email'] . '"';
            }
            ?>/>
                         <?php
                         if (isset($_POST['enviar'])){
                             if(!preg_match("/^[a-z]{1,50}$/i", $_POST["email"])){
                                 echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";
                             }else{
                                 $mail = true;
                             }
                         } 
                             
                         ?><br>
            Contraseña:<input type="password" name="contraseña" <?php
            if (!empty($_POST['contraseña'])) {
                echo 'value="' . $_POST['contraseña'] . '"';
            }
            ?>/>
                              <?php
                              if (isset($_POST['enviar'])){
                                  if(!preg_match("/^[a-z]{1,50}$/i", $_POST["contraseña"])){
                                  echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";    
                                  }else{
                                      $pass = true;
                                  }
                              } 
                                  
                              ?><br>

            Color de Letra:<select name="color_letra">
                <?php
                $colorLetra = array("negro" => "black", "rojo" => "red", "azul" => "blue", "verde" => "green");
                foreach ($colorLetra as $key => $value) {
                    echo '<option value="' . $value . '" ';
                    if (!empty($_POST["color_letra"]) && $_POST["color_letra"] == $value) {
                        echo 'selected';
                    }
                    echo ">" . $key . '</option>';
                }
                ?></select><br>
            Color de Fondo:<select name="color_fondo">
                <?php
                $colorFondo = array("blanco" => "white", "rojo" => "red", "azul" => "blue", "verde" => "green");
                foreach ($colorFondo as $key => $value) {
                    echo '<option value="' . $value . '" ';
                    if (!empty($_POST["color_fondo"]) && $_POST["color_fondo"] == $value) {
                        echo 'selected';
                    }
                    echo ">" . $key . '</option>';
                }
                ?></select><br>
            Tipo de Letra:<select name="letra">
                <?php
                $colorFondo = array("arial" => "Arial", "Times New Roman" => "serif ", "fantasy" => "fantasy", "monospace " => "monospace ");
                foreach ($colorFondo as $key => $value) {
                    echo '<option value="' . $value . '" ';
                    if (!empty($_POST["letra"]) && $_POST["letra"] == $value) {
                        echo 'selected';
                    }
                    echo ">" . $key . '</option>';
                }
                ?></select><br>
            Tamaño de Letra:<select name="tamaño">
                <?php
                $colorFondo = array(12, 14, 16, 18);
                foreach ($colorFondo as $key => $value) {
                    echo '<option value="' . $value . '" ';
                    if (!empty($_POST["tamaño"]) && $_POST["tamaño"] == $value) {
                        echo 'selected';
                    }
                    echo ">" . $value . '</option>';
                }
                ?></select><br>
                <input type='submit' name='registrar' value='Registrar'/>
        </form>
    </body>
</html>
        <?php
}
?>
