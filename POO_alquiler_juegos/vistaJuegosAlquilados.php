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
            <h1>Lista de juegos Alquilados</h1>
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
             ?>
            <a href="juegosNoAlquilados.php" >Listado de Juegos NO Alquilados</a> -- <a href="misJuegosAlquilados.php" >Mis Juegos Alquilados</a>
              
              <?php
            if($_SESSION['nombre'] == "Admin"){
                ?>
           <a href="vistaAdministrador.php">Volver</a>
                    <?php
            }else{
                ?>
           <a href="vistaCliente.php">Volver</a>
                    <?php       
            }
             $juegos = controladorAlquiler::recuperarTodosConCliente();
                     if($juegos->rowCount() > 0){
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
                                <th>Persona que lo posee</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php 
                                 
                                 while($registro = $juegos->fetchObject()){ 
                                      
                                     ?>
                            <tr>
                            <td><img src="<?php echo $registro->Imagen; ?>" width="50px" height="70px"/></td>
                            <td><?php echo $registro->Nombre_juego; ?></td>
                            <td><?php echo $registro->Nombre_consola; ?></td>
                            <td><?php echo $registro->Anno; ?></td><!-- comment -->
                            <td><?php echo $registro->Precio; ?></td>
                             <td><?php echo $registro->Nombre; ?></td>
                        
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

