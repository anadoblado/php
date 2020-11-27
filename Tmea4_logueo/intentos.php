<?php
session_start();
//echo $_SESSION['intentos'];
if (!isset($_SESSION['intentos'])) {
    header("location:index.php");
}
if (isset($_SESSION['user'])){
    header("location:inicio.php");
}

?>
<html>
    <head>
        <title>title</title>
         <link rel="stylesheet" type="text/css" href="myStyle.css" media="screen" />
    </head>
    <body>
<form action="">
    <div>
        <h1>HAS AGOTADO EL NÚMERO DE INTENTOS</h1>
        <h3>Cierra el navegador para volver a intentarlo</h3>
    </div>
</form>
    </body>
</html>

