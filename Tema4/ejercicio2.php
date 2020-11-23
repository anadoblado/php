<html>
    <head>
        <meta charset="UTF-8">
        <title>title</title>
    </head>
    <body>
        <?php
        if (isset($_POST['enviar']) && isset($_POST['nombre']) && isset($_POST['password'])) {
            session_name($_POST['nombre']);
            session_start();
            //$_SESSION['nombre'] = $_POST['nombre'];
            // echo $_SESSION['nombre'];
           // $_SESSION['password'] = $_POST['password'];

            $fecha = date('d-m-y h:i:s');

            setcookie('nombre', $_POST['nombre'], time() + 3600);
            setcookie('password', $_POST['password'], time() + 3600);
            setcookie('ultimaVisita', $fecha, time() + 3600);

            if (isset($_POST['recordar'])) {
                setcookie("chekeo", "checked", time() + 3600);
            }
            // comprobamos si la variable ya existe
            if (isset($_SESSION['visitas'])) {
                // contador de visitas, cada visitia suma uno
                 $_SESSION['visitas']++;
                //$_SESSION['visitas'][] = mktime();
                echo "Hola " . session_name() . "<br>";
//                foreach ($_SESSION['visitas'] as $value) {
//                    echo $value;
//                }

                echo "Visita número: " . $_SESSION['visitas'] . "<br>";
            } else {
                $_SESSION['visitas'] = 0;
                echo "Bienvenido a nuestra página";
                //$_SESSION['visitas'][] = date("Y-m-d H:i:s");
            }
           ?>
        <form action="ejercicio2.php" method="post">
              <input type="submit" value="Volver" name="volver">
        </form>
        <?php
            try {
                $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                $conex = new PDO('mysql:host=localhost; dbname=formcookie; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
                $error = $conex->errorInfo();
            } catch (PDOException $exc) {
                echo $exc->getTraceAsString(); // error de php
                echo 'Error:' . $exc->getMessage(); // error del servidor de bd
            }

            if (isset($_POST['enviar']) && (!empty($_POST['nombre'])) && (!empty($_POST['password']))) {
                $result = $conex->query("SELECT * from datos where nombre='$_POST[nombre]' and password='" . md5($_POST["password"]) . "'");
                while ($obj = $result->fetch(PDO::FETCH_OBJ)) {
                    $_SESSION['nombre'] = $obj->nombre;
                    $_SESSION['password'] = $obj->password;
                }
            }
        }else{
        ?>
         <form action="" method="post">
            <label>Nombre de usuario</label>
            <input type="text" name="nombre" value="<?php
            if (isset($_POST['volver'])  && isset($_COOKIE['chekeo'])) {
                echo $_COOKIE['nombre'];
            }
            ?>"><br>
            <label>Contraseña</label>
            <input type="password" name="password" value="<?php
            if (isset($_POST['volver'])  && isset($_COOKIE['chekeo'])) {
                echo $_COOKIE['password'];
            }
            ?>"><br>

            <label>Recuerdame</label>
            <input type="checkbox" name="recordar" value="<?php if (isset($_COOKIE['chekeo'])) echo $_COOKIE['chekeo']; ?>"><br>
            <input type="submit" value="enviar" name="enviar">
            <input type="submit" value="borrar" name="borrar">
        </form>
        
      
        
       
        <?php
          }
        if (isset($_POST['borrar'])) {
             $fecha = date('d-m-y h:i:s');
            setcookie('nombre', $_POST['nombre'], time() - 3600);
            setcookie('password', $_POST['password'], time() - 3600);
            setcookie('ultimaVisita', $fecha, time() - 3600);
             setcookie("chekeo", "checked", time() - 3600);
        }
        ?>
    </body>
</html>
