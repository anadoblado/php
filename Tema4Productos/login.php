
<?php
if (isset($_POST['enviar']) && isset($_POST['nombre']) && isset($_POST['pass'])) {

    try {
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql:host=localhost; dbname=formcookie; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        $error = $conex->errorInfo();
        $result = $conex->query("SELECT * FROM datos WHERE nombre='$_POST[nombre]' and password='" . md5($_POST["pass"]) . "'");
//        while ($obj = $result->fetch(PDO::FETCH_OBJ)) {
//            $_SESSION['nombre'] = $obj->nombre;
//            //echo  $_SESSION['nombre'];
//            $_SESSION['password'] = $obj->password;
//        }
        if ($result->rowCount()) {
            //session_name($_POST['nombre']);
            session_name();
            session_start();
            $_SESSION['nombre']=$_POST['nombre'];
            header("location:productos.php");
        } else {
            //echo '<span class='."mensaje".'>El usuario no existe</span><br>' ;
            //header("location:login.php");
            ?>
            <span class="mensaje">El usuario no existe</span>
<form action="login.php">
    <input type="submit" name="volver" value="Volver">
</form>
                <?php
           
        }
        
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }
//    if($_SESSION['nombre']== $_POST['nombre'] &&  $_SESSION['password']==$_POST['pass']){
//            header("location:productos.php");
//            //echo $_SESSION['nombre'];
//        }
} else {
    ?>
    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="myStyle.css" media="screen" />
        </head>
        <body>
            <fieldset id="login">
                <legend id="login">Login</legend>
                <form action="" method="post">
                    <label id="login">Nombre</label>
                    <input id="login" type="type" name="nombre" value=""><br><!-- comment/ -->
                    <label id="login">Contraseña</label>
                    <input type="password" name="pass" value=""><br>
                    <input id="login" type="submit" value="Enviar" name="enviar">
                </form>
            </fieldset>

    <?php
}
?>

    </body>
</html>

