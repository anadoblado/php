<?php
require_once './Controlador/controladorUsuario.php';

$incorrecto = false;


if(isset($_POST['entrar']) && isset($_POST['dni']) && isset($_POST['clave'])){
    $usuario = controladorUsuario::buscarUsuario($_POST['dni'], $_POST['clave'], $errores);
   
    if(empty($errores) && $usuario != null){
        session_start();
        $_SESSION['dni']=$usuario->dni;
        $_SESSION['nombre']=$usuario->nombre;
        $_SESSION['apellidos']=$usuario->apellidos;
        header("location:inicio_cliente.php");
    }
}
?>
<!-- comment --><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="myStyle.css" media="screen" />
        </head>
        <body>

            <div id='login'>
                <form action='' method='post'>
                    <fieldset >
                        <?php
//                        if ($incorrecto == true) {
//                            echo '<span class="mensaje">USUARIO INCORRECTO TE QUEDAN '.$_SESSION["intentos"].' INTENTOS</span>';
//                        }
                        ?>
                        <legend>LOGUIN</legend>
                        <div><span class='error'>	</span></div>
                        <div class='campo'>
                            <label for='dni' >DNI:</label><br/>
                            <input type='text' name='dni' id='dni' /><br/>
                        </div>
                        <div class='campo'>
                            <label for='password' >Contraseña:</label><br/>
                            <input type='text' name='clave' id='clave' /><br/>
                        </div>
                        <div class='campo'>
                            <input type='submit' name='entrar' value='Entrar' />
       
                        </div>
                    </fieldset>
                </form>
            </div>

            <?php
        

        ?>

    </body>
</html>

    </body>
</html>
