<?php
require_once './Controlador/controladorJuego.php';
require_once './Controlador/controladorCliente.php';
require_once './Controlador/controladorAlquiler.php';
session_start();
//echo 'vista cliente';
if(!isset($_SESSION['nombre'])){
    header("Location:index.php");
    }

if (isset($_POST['cerrar'])){
    if(!isset($_SESSION['nombre'])){
    header("Location:index.php");
    }else{
        setcookie(session_name(), "", time()-3600, "/");
        session_unset();
        session_destroy();
        header("Location:index.php");  
    }
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
            <h1>Lista de juegos NO Alquilados</h1>
            <div class="py-3 ml-3">
                <?php echo "Hola ".$_SESSION['nombre'];
 
                 ?>
            </div>
            
             <?php
                if($_SESSION['nombre'] == "Admin"){
            ?>
            
            <a href="vistaAdministrador.php" >Listado de Juegos</a> --
             <?php
            }else{
                ?>
           <a href="vistaCliente.php">Listado de Juegos</a>---
                    <?php
            }
             ?> <a href="vistaJuegosAlquilados.php" >Listado de Juegos Alquilados</a> -- <a href="juegosNoAlquilados.php" >Listado de Juegos NO Alquilados</a> -- <a href="misJuegosAlquilados.php" >Mis Juegos Alquilados</a>
              <?php
                $juegos = controladorJuego::recuperarNoAlquilados();
                if ($juegos != null){
              ?>
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
                                
                                 foreach ($juegos as $value) {
                                      echo '<tr>';
                                     ?>
                        <td><a href="mostrar.php?codigo=<?php echo $value->codigo; ?>"><img src="<?php echo $value->imagen; ?>" width="50px" height="70px"/></a></td>
                           
                            <td><?php echo $value->nombre_juego; ?></td>
                            <td><?php echo $value->nombre_consola; ?></td>
                            <td><?php echo $value->anno; ?></td><!-- comment -->
                            <td><?php echo $value->precio; ?></td>
                            
                                         <?php
                                      echo '</tr>';
                                      
                                  }
                }else{
                    ?>
                            <div class="alert alert-info">
                                 <strong>Info!</strong> No hay juegos en la lista.
                            </div>
                        <?php
                }
                                  
                                ?>
                           
                           
                        </tbody>
                    </table>
                </div>

            </div>
    </body>
</html>

