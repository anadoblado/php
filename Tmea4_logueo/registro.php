<?php
session_start();
//if (!isset($_SESSION['user'])) {
//    header("location:index.php");
//}

if ($_SESSION['intentos'] == 0) {
    header("location:intentos.php");
}
if (isset($_SESSION['user'])){
    header("location:inicio.php");
}
$userExiste = false;
if (isset($_POST['enviar']) && preg_match("/^[a-z]{1,50}$/i", $_POST["nombre"]) && preg_match("/^[a-z]{1,50}$/i", $_POST["apellido"]) && preg_match("/^[a-z]{1,50}$/i", $_POST["direccion"]) && preg_match("/^[a-z]{1,50}$/i", $_POST["localidad"]) && preg_match("/^[a-z0-9-]{1,}@[a-z0-9-]{1,}(\.[a-z]{2,})$/i", $_POST["user"]) && preg_match("/^[0-9a-z]{1,50}$/i", $_POST["pass"]) && !empty($_POST['color_letra']) && !empty($_POST['color_fondo']) && !empty($_POST['tipo_letra']) && !empty($_POST['tam_letra'])) {
//    echo $_POST['nombre'];
//    echo $_POST['apellido'];
//    echo $_POST['direccion'];
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conex = new PDO('mysql:host=localhost; dbname=logueo; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
    $error = $conex->errorInfo();
    $result = $conex->query("SELECT * FROM perfil_usuario WHERE  user='$_POST[user]'");
    if($result->rowCount()){
        $userExiste =  true;
    }else{
    //$result = $conex->query("SELECT * FROM perfil_usuario WHERE user='$_POST[user]' and pass='" . md5($_POST["pass"]) . "'");
    $result = $conex->prepare("INSERT into perfil_usuario (nombre,apellidos,direccion,localidad,user,pass,color_letra,color_fondo,tipo_letra,tam_letra) values (?, ?, ?,?, ?, ?,?, ?, ?,?);");
    $encriptada = md5($_POST["pass"]);

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $user = $_POST['user'];
    $pass = $encriptada;
    $color_letra = $_POST['color_letra'];
    $color_fondo = $_POST['color_fondo'];
    $tipo_letra = $_POST['tipo_letra'];
    $tam_letra = $_POST['tam_letra'];

    $result->bindParam(1, $nombre);
    $result->bindParam(2, $apellidos);
    $result->bindParam(3, $direccion);
    $result->bindParam(4, $localidad);
    $result->bindParam(5, $user);
    $result->bindParam(6, $pass);
    $result->bindParam(7, $color_letra);
    $result->bindParam(8, $color_fondo);
    $result->bindParam(9, $tipo_letra);
    $result->bindParam(10, $tam_letra);
    $result->execute();
    
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['apellidos'] = $_POST['apellido'];
    $_SESSION['direccion'] = $_POST['direccion'];
    $_SESSION['localidad'] = $_POST['localidad'];
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['pass'] = $pass;
    $_SESSION['color_letra'] = $_POST['color_letra'];
    $_SESSION['color_fondo'] = $_POST['color_fondo'];
    $_SESSION['tipo_letra'] = $_POST['tipo_letra'];
    $_SESSION['tam_letra'] = $_POST['tam_letra'];
    header("location:inicio.php");    
    }
    
} if(!isset($_POST['enviar']) || isset($_POST['enviar']) || $userExiste == true) {
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
                if (isset($_POST['enviar'])) {
                    if (!preg_match("/^[a-z]{1,50}$/i", $_POST["nombre"])) {
                        echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";
                    }
                }
                ?><br>

                Apellido:<input type="text" name="apellido" <?php
                              if (!empty($_POST['apellido'])) {
                                  echo 'value="' . $_POST['apellido'] . '"';
                              }
                              ?>/>
                <?php
                if (isset($_POST['enviar'])) {
                    if (!preg_match("/^[a-z]{1,50}$/i", $_POST["apellido"])) {
                        echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";
                    }
                }
                ?><br>
                Dirección:<input type="text" name="direccion" <?php
                                if (!empty($_POST['direccion'])) {
                                    echo 'value="' . $_POST['direccion'] . '"';
                                }
                                ?>/>
                <?php
                if (isset($_POST['enviar'])) {
                    if (!preg_match("/^[a-z]{1,50}$/i", $_POST["direccion"])) {
                        echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";
                    }
                }
                ?><br>
                Localidad:<input type="text" name="localidad" <?php
                                 if (!empty($_POST['localidad'])) {
                                     echo 'value="' . $_POST['localidad'] . '"';
                                 }
                                 ?>/>
                                 <?php
                                 if (isset($_POST['enviar'])) {
                                     if (!preg_match("/^[a-z]{1,50}$/i", $_POST["localidad"])) {
                                         echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";
                                     }
                                 }
                                 ?><br>
                Email:<input type="text" name="user" <?php
                                 if (!empty($_POST['user'])) {
                                     echo 'value="' . $_POST['user'] . '"';
                                 }
                                 ?>/>
                                 <?php
                                 if (isset($_POST['enviar'])) {
                                     ///^[_a-z0-9-]+(\.[_a-z0-9-]+)@[a-z0-9-]+(\.[a-z0-9-]+)(\.[a-z]{2,})$/i
                                     if($userExiste == true){
                                          echo "<span style='color:red'>Este correo ya existe</span>";
                                     }
                                     
                                     if (!preg_match("/^[a-z0-9-]{1,}@[a-z0-9-]{1,}(\.[a-z]{2,})$/i", $_POST["user"])) {
                                         echo "<span style='color:red'>No puede estar vacio y debe tener el formato a@dd. </span>";
                                     }
                                     
                                 }
                                 ?><br>
                Contraseña:<input type="password" name="pass" <?php
                             if (!empty($_POST['pass'])) {
                                 echo 'value="' . $_POST['pass'] . '"';
                             }
                             ?>/>
                             <?php
                             if (isset($_POST['enviar'])) {
                                 if (!preg_match("/^[0-9a-z]{1,50}$/i", $_POST["pass"])) {
                                     echo "<span style='color:red'>No puede estar vacio</span>";
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
                Tipo de Letra:<select name="tipo_letra">
                    <?php
                    $tipoLetra = array("arial" => "Arial", "Times New Roman" => "serif ", "fantasy" => "fantasy", "monospace " => "monospace ");
                    foreach ($tipoLetra as $key => $value) {
                        echo '<option value="' . $value . '" ';
                        if (!empty($_POST["tipo_letra"]) && $_POST["tipo_letra"] == $value) {
                            echo 'selected';
                        }
                        echo ">" . $key . '</option>';
                    }
                    ?></select><br>
                Tamaño de Letra:<select name="tam_letra">
                    <?php
                    $tamLetra = array(12, 14, 16, 18);
                    foreach ($tamLetra as $key => $value) {
                        echo '<option value="' . $value . '" ';
                        if (!empty($_POST["tam_letra"]) && $_POST["tam_letra"] == $value) {
                            echo 'selected';
                        }
                        echo ">" . $value . '</option>';
                    }
                    ?></select><br>
                <input type='submit' name='enviar' value='Registrar'/>
                <input type='submit' name='volver' value='Volver'/>
            </form>
        </body>
    </html>
                    <?php
                }
                if(isset($_POST['volver']))  header("location:index.php");
                ?>
