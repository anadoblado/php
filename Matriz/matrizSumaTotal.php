 <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
        require_once 'funciones.php';
            if (empty($_POST['fil']) && empty($_POST['col'])){
              ?>
              <form action="" method="post">
                Introduce el número de filas <input type="tex" name="fil"><br>
                Introduce el número de columnas <input type="tex" name="col"><br>
             <input type="submit" name="enviar2" value="Crear">
        </form>
        <?php 
            }
            ?>
        <?php 
        if(isset($_POST['enviar2'])){
             echo "Las matriz es de ".$_POST['fil']."x".$_POST['col'];
             
             $matriz = crearMatriz($_POST['fil'], $_POST['col']);
             mostrarMatriz( $matriz);
             echo"<p>Sumas por filas<p>";
             
             $suma = sumaTotal($matriz);
             echo 'La suma total de los valores por filas es: '.$suma.'<br>';
             echo 'La suma total de los valores por columnas es: '.$suma.'<br>';   
        }
        ?>
    </body>
</html>

