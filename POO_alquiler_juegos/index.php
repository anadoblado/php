<?php
require_once './Controlador/controladorJuego.php';

try {
$conex = new Conexion();
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
            <h1>Bienvenid@ a nuestro sistema</h1>
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
                                  $juegos = controladorProducto::recuperarTodos();
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
} catch (PDOException $exc) {
echo $exc->getTraceAsString(); // error de php
echo 'Error:' . $exc->getMessage(); // error del servidor de bd
}
?>