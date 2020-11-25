<?php
$correcto = true;
if (isset($_POST['entrar']) && isset($_POST['usuario']) && isset($_POST['pass'])) {

    try {
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        $error = $conex->errorInfo();
        $result = $conex->query("SELECT * FROM usuarios WHERE nombre='$_POST[usuario]' and password='" . md5($_POST["pass"]) . "'");
//        while ($obj = $result->fetch(PDO::FETCH_OBJ)) {
//            $_SESSION['nombre'] = $obj->nombre;
//            //echo  $_SESSION['nombre'];
//            $_SESSION['password'] = $obj->password;
//        }
        if ($result->rowCount()) {
            //session_name($_POST['nombre']);
            session_name();
            session_start();
            $_SESSION['nombre'] = $_POST['nombre'];
            if(isset($_POST['entrar'])){
                 header("location:inicio.php");
            }
           
           // header("location:productos.php");
        } else {
            $correcto = false;
            $intento = 0;
            if(isset($_COOKIE['intentos'])){
               $intento++;
               setcookie('intentos', $intento);
            } else {
                $intento++;
                 setcookie('intentos', $intento);
            }
            if( $intento == 3){
                 header("location:intentos.php");
                 
            }
        }
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }
} if (!isset($_POST['enviar']) || $correcto == false) {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Logueo</title>
            <link rel="stylesheet" type="text/css" href="myStyle.css" media="screen" />
        </head>
        <body>
    <?php ?>
        <div id="login">
            <form action="" method="post">
                <fieldset>
                    <legend>FORMULARIO DE REGISTRO</legend>   
                    <div class="campo">
                        <label for='usuario'>Usuario</label><br/>
                        <input id="usuario" type="text" name="usuario" value="" ><br><!-- comment/ -->
                    </div>
                    <div class="campo">
                        <label for='password' >Pass</label><br>
                        <input id="password" type="password" name="pass" value="" ><br>  
                    </div>
                    <div class="campo">
                        <input type="submit" value="Entrar" name="entrar">    
                    </div>
                    <div class="campo">
                        <input type="submit" value="Registrar" name="registrar">    
                    </div>
                </fieldset>
            </form>
        </div>
<?php } ?>
    </body>
</html>
