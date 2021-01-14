<?php

require_once './Controlador/controladorCliente.php';
// inicio de sesión
session_start();

// controla que si no hay sesión iniciada no puedas entrar
if(!isset($_SESSION['nombre'])){
    header("Location:index.php");
    }
    // recoge el resultado del botón de borrar 
if(isset($_POST['borrar'])){
    controladorCliente::eliminarCliente($dni);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Insert title here</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </head>
    <body>
           
        <div class="container py-3">
            <div class="ml-3">
                <?php echo "Hola " . $_SESSION['nombre']; ?>
            </div>
            <div class="container">

                <?php if($_SESSION['nombre'] == "Admin"){
                    ?>
                <a href="vistaAdministrador.php">Volver</a>
                     <?php
                }else{
                   ?>
                     <a href="vistaCliente.php">Volver</a>
                     <?php
                }
            ?>
                
                <h4 style="text-align: start">Gestiona los Clientes</h4>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Avatar</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Localidad</th>
                            <th></th>
                            <th></th>
                           
                           
                        </tr>
                    </thead>

                    <?php
                    try {
                        
                        $clientes = controladorCliente::recuperarTodos();

                        foreach ($clientes as $values) {
                            ?>
                            <tr>
                                <td> <img src="<?php echo $values->imagen ?>" width="60px" height="70px"/></td>
                                <td><?php echo $values->nombre ?></td>
                                <td><?php echo $values->apellidos ?></td>
                                <td><?php echo $values->direccion ?></td>
                                <td><?php echo $values->localidad ?></td>
                                <td> <form  action="vistaEditarC.php" method="post"><button class="btn btn-outline-success" class="visible" type="submit" name="editar" value="<?php echo $values->dni ?>" <?php if($values->tipo == "admin") echo 'disabled';?>>Editar</button>  </form> </td>
                                <td> <form  action="" method="post"><button class="btn btn-outline-danger" class="visible" type="submit" name="borrar" value="<?php echo $values->dni ?>" <?php if($values->tipo == "admin") echo 'disabled';?>>Borrar</button>  </form> </td>

                            </tr>
                            <?php
                        }
                    } catch (PDOException $exc) {
                        echo $exc->getTraceAsString(); // error de php
                        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
                    }
                    ?>

                </table>
            </div>
        </div>

    </body>
</html>

