<?php
require_once './Controlador/controladorJuego.php';
require_once './Controlador/controladorCliente.php';

if(isset($_POST['enviar']) && isset($_POST['dni']) && isset($_POST['pass'])){
    $cliente = controladorCliente::buscarCliente($_POST['dni'],$_POST['pass'], $errores);
    //compruebo que hay coincidencias y que existe el usuario en la bbdd
    if(empty($errores) && $cliente != null){
         session_start();
         //echo $cliente->tipo;
//         $_SESSION['nombre'] = $cliente->nombre;
//         $_SESSION['dni'] = $cliente->dni;
//         if($cliente->tipo = "admin"){
//             header("location:vistaAdministrador.php");
//         }
//          header("location:vistaCliente.php");
          if($cliente->nombre == "Admin"){
              $_SESSION['nombre'] = $cliente->nombre;
              $_SESSION['dni'] = $cliente->dni;
              header("location:vistaAdministrador.php");
         }else{
              $_SESSION['nombre'] = $cliente->nombre;
              $_SESSION['dni'] = $cliente->dni;
              header("location:vistaCliente.php");
         }

    }
    
}
if(isset($_POST['registrar'])){ 
    header("location:registrarCliente.php");
    
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        
        ?>
        <div class="container">
            <h1>Juegos Comares</h1>
            <form action="" method="post">
                <input type="text" name="dni" placeholder="Dni">
                <input type="text" name="pass" placeholder="Contraseña">
                <button type="submit" name="enviar" class="btn btn-light">Loguear</button>
                 <button type="submit" name="registrar" class="btn btn-light">Registrar</button>
<!--                <input type="submit" value="Loguear" name="enviar">-->
            </form>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Portada</th>
                                <th>Nombre juego</th>
                                <th>Nombre consola</th>
                                <th>Año</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php 
                                  $juegos = controladorJuego::recuperarTodos();
                                  foreach ($juegos as $value) {
                                      echo '<tr>';
                                     ?>
                            <td><img src="<?php echo $value->imagen; ?>" width="50px" height="70px"/></td>
                            <td><?php echo $value->nombre_juego; ?></td>
                            <td><?php echo $value->nombre_consola; ?></td>
                            <td><?php echo $value->anno; ?></td><!-- comment -->
                            <td><?php echo $value->precio; ?></td>
                                         <?php
                                      echo '</tr>';
                                      
                                  }
                                ?>
                               
                           
                        </tbody>
                    </table>
                </div>

            </div>
    </body>
</html>
<?php

?>