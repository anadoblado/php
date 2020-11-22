<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
try{
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
    $conexion = new PDO('mysql:host=localhost; dbname=usuarios', 'dwes', 'abc123.');
    $error = $conexion->errorInfo();
    echo $error[2];

    $encontrado = true;

if(isset($_POST["enviar"]) && isset($_POST["usuario"]) && isset($_POST["password"])){
    $usuarios = $conexion->query("SELECT * FROM usuario where user='".$_POST["usuario"]."' && password='".md5($_POST["password"])."'");
    // con el md5 codifica la contraseña que le pasas, porque la hemos codificado previamente
    if($usuarios->fetchObject()){
    if(!empty($_POST["recordarme"])){
    setCookie("usu",$_POST["usuario"]);
    setCookie("pass",$_POST["password"]);
    
    }else{
        // con unset borrar la cookie
    unset($_COOKIE["usu"]);
    unset($_COOKIE["pass"]);
    setCookie("usu","");
    setCookie("pass","");
    }
    setCookie($_POST["usuario"],date("d-m-y h:i:s"));
    echo"<p>Hola ".$_POST["usuario"];
    if(isset($_COOKIE[$_POST["usuario"]])){
        echo" su Ãºltima conexion fuÃ© : ".$_COOKIE[$_POST["usuario"]];
    }
    

 
?>
    <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <input type="submit" name="salir" value="salir">
    </form>
<?php
    }
    else{
        $encontrado = false;
        echo"<h3>Datos erroneos</h3>";
    }
    }
    if(!isset($_POST["enviar"]) || $encontrado == false){
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label>Usuario</label>
            <input type="text" name="usuario" <?php if(isset($_COOKIE["usu"])){ echo"value='".$_COOKIE["usu"]."'"; }?>>

            <p/>
            <label>Password</label>
            <input type="password" name="password" <?php if(isset($_COOKIE["pass"])){ echo"value='".$_COOKIE["pass"]."'"; }?>>
            </p>
            <label>Recuerdame</label>
            <input type="checkbox" name="recordarme" value="true">
            <input type="submit" value="enviar" name="enviar">
    </body>
    <?php 
    
}}
     catch (PDOException $exc) {
            echo $exc->getTraceAsString(); 
            echo 'Error:' . $exc->getMessage(); 
            }
    ?>
</html>

