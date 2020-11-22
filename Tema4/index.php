<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // iniciamos la sesión, debe estar antes de que salga nada por pantalla, porque debe de ser lo primero que se mande
        session_start();
        echo session_id() . "<br>";
        echo "<br>";
        echo session_name(). "<br>";
        $_SESSION['nombre']="Ana";
        echo $_SESSION['nombre']."<br>";
        //setcookie("PHPSESSID", session_id(), time()+3600);
        
        
        ?>
        <a href="ejem_session.php">Cambiar</a>
    </body>
</html>
