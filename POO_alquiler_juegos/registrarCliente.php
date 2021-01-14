<?php

require_once './Controlador/controladorCliente.php';

session_start();

    
if(isset($_POST['enviar'])){
    if(is_uploaded_file($_FILES['foto']['tmp_name'])){
        $cliente = new Cliente();
        $fich_unic=time()."-".$_FILES['foto']['name'];
        $ruta="imagenes/".$fich_unic;
        //para copiar el fichero en la carpeta usamos la funciçon move_uploaded_file
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        
        $cliente->nuevoCliente($_POST['dni'],$_POST['nombre'],$_POST['apellidos'],$_POST['direccion'],$_POST['localidad'],$_POST['password'],'cliente',$ruta);
        controladorCliente::insertar($cliente);   
        header("location:index.php");
       
   
    }else{
        echo 'ERROR al cargar la imagen';
    }
}   
?>
<html>
    <head>
        <title>Registrar</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <style>
            .containerOwnApp {
                box-shadow: 0 0 27px 0 rgba(84, 84, 84, 0.62);
                padding-top: 15px;
            }

            .login-page {
                padding: 18% 0 0;
                margin: 0 auto 100px;
                max-width: 360px;
                position: relative;
            }

            .login-form {
                box-shadow: 0 0 27px 0 rgba(84, 84, 84, 0.62);
            }

            .login-form-header {
                padding-top: 16px;
            }

            .login-from-row {
                padding-top: 16px;
                padding-bottom: 16px;
            }

            .login-form-font-header {
                font-size:30px; 
                font-weight: bold;
            }

            .login-form-font-header span {
                color: #007C9B;
            }
        </style>
    </head>
    <body>
<div class="container">
            <div class="row text-center login-page">
                <div class="col-md-12 login-form">
                    <form action="" method="post" enctype="multipart/form-data"> 			
                        <div class="row">
                            <div class="col-md-12 login-form-header">
                                <p class="login-form-font-header"><span>Cliente</span> Nuevo<p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 login-from-row">
                                <input name="dni" type="text" placeholder="DNI" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 login-from-row">
                                <input name="nombre" type="text" placeholder="Nombre" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 login-from-row">
                                <input name="apellidos" type="text" placeholder="Apellidos" required/>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 login-from-row">
                                <input name="direccion" type="text" placeholder="Dirección" required/>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 login-from-row">
                                <input name="localidad" type="text" placeholder="Localidad" required/>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 login-from-row">
                                <input name="password" type="text" placeholder="Contraseña" required/>
                            </div>
                        </div>
                        
                            <div class="row">
                            <div class="col-md-12 login-from-row">
                                <input name="foto" type="file" placeholder="Imagen" required/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 login-from-row">
                                <button class="btn btn-info" name="enviar">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>




