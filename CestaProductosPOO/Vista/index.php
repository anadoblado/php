<?php
require_once '../Controlador/controladorUsuario.php';

$correcto = true;
if (isset($_POST['enviar']) && isset($_POST['nombre']) && isset($_POST['pass'])) {
    $usuario = ControladorUsuario::buscarUsuario($_POST['nombre'], $_POST['pass'], $errores);
    //compruebo que hay coincidencias y que existe el usuario en la bbdd
    if(empty($errores) && $usuario != null){
         session_start();
         $_SESSION['nombre'] = $usuario;
          header("location:vistaCesta.php");
    }

//    try {
//        $conex = new Conexion();
//        $result = $conex->query("SELECT * FROM usuarios WHERE nombre='$_POST[nombre]' and password='" . md5($_POST["pass"]) . "'");
////        while ($obj = $result->fetch(PDO::FETCH_OBJ)) {
////            $_SESSION['nombre'] = $obj->nombre;
////            //echo  $_SESSION['nombre'];
////            $_SESSION['password'] = $obj->password;
////        }
//        if ($result->rowCount()) {
//            //session_name($_POST['nombre']);
//            session_name();
//            session_start();
//            $_SESSION['nombre'] = $_POST['nombre'];
//            header("location:vistaCesta.php");
//        } else {
//            $correcto = false;
//            //echo '<span class='."mensaje".'>El usuario no existe</span><br>' ;
//            //header("location:login.php");
//            ?>
            <!--            <span class="mensaje">El usuario no existe</span>
                        <form action="login.php">
                            <input type="submit" name="volver" value="Volver">
                        </form>-->
            <?php
//        }
//    } catch (PDOException $exc) {
//        echo $exc->getTraceAsString(); // error de php
//        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
//    }
//    if($_SESSION['nombre']== $_POST['nombre'] &&  $_SESSION['password']==$_POST['pass']){
//            header("location:productos.php");
//            //echo $_SESSION['nombre'];
//        }
} if (!isset($_POST['enviar']) || $correcto == false) {
    ?>
    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="myStyle.css" media="screen" />
        </head>
        <body>
            <div id="login">

                <form action="" method="post">
                    <fieldset>
                        <legend id="login">Login</legend>
                        <?php
                        if ($correcto == false) {
                            ?>
                            <span class="mensaje">El usuario no existe</span>
                            <?php
                        }
                        ?>
                        <div class="campo">
                            <label for='usuario'>Nombre</label><br/>
                            <input id="usuario" type="text" name="nombre" value="" ><br><!-- comment/ -->
                        </div>


                        <div class="campo">
                            <label for='password' >Contraseña</label><br>
                            <input id="password" type="password" name="pass" value="" ><br>  
                        </div>
                        <div class="campo">
                            <input type="submit" value="Enviar" name="enviar">    
                        </div>
                    </fieldset>
                </form>
            </div>

            <?php
        }
        ?>

    </body>
</html>
