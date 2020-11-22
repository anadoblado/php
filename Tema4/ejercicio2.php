<html>
    <head>
        <meta charset="UTF-8">
        <title>title</title>
    </head>
    <body>
        <?php 
            session_start();
           // $_SESSION['nombre'] = $_POST['usuario'];
            
            // comprobamos si la variable ya existe
            if(isset($_SESSION['visitas'])){
                // contador de visitas, cada visitia suma uno
                //$_SESSION['visitas']++;
                //$_SESSION['visitas'][] = mktime();
                 $_SESSION['visitas'][] = date("Y-m-d H:i:s");
            }
            //else{
               // $_SESSION['visitas'] = 0;
            //}
        ?>
        <form action="" method="post">
            <label>Nombre de usuario</label>
            <input type="text" name="usuario">
            <label>Contraseña</label>
            <input type="password" name="password">
            <label>Recuerdame</label>
            <input type="checkbox" name="recordarme" value="true">
            <input type="submit" value="enviar" name="enviar">
        </form>
    </body>
</html>
