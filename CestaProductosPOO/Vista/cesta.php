<?php
require_once '../Controlador/controladorProducto.php';
session_start();

if(!isset($_SESSION['nombre'])){
    header("location:login.php");
}else{
    
    //echo $_SESSION['nombre'];
}

?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA-Listado de productos</title>
        <link rel="stylesheet" type="text/css" href="myStyle.css" media="screen" />
    </head>
    <body class="pagcesta">
        <div id="contenedor">
            <div id="encabezado">
                <h1>Cesta de la compra</h1>
            </div>
            <div id="pagproductos">
                <?php
                    if(isset($_SESSION['cesta'])){
                         $total = 0;
                        foreach ($_SESSION['cesta'] as $value) {
                            echo '<label>Producto: '.$value->nombre_corto.'----- Precio: '. $value->PVP.' € ----- </label><br>';
        
                                $total += $value->PVP;
                                   
                             }
                    }
                            ?>
                
                <hr />
                <p><span class="pagar">Precio total: <?php echo $total ?>		€</span></p>
                <form action="pagar.php" method="POST">
                    <p><span class="pagar"><input type="submit" name="pagar" value="Pagar"></span></p>
                </form>
            </div>
            <br class="divisor" />
            <div id="pie">
                <form action="logoff.php" method="POST">
                    <input type="submit" name="salir" value="Abandonar la sesión">
                </form>

		<p class='error'>   </p>
                
            </div>
        </div>
        
        
        
    </body>
</head>
</html>
