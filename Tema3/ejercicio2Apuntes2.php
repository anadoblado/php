<html>
    <head>
        <title>Ejemplo</title>
        <style>
            h1 {margin-bottom:0;} 
            #encabezado {
                background-color:#ddf0a4;
            }
            #contenido {
                background-color:#EEEEEE;
                height:600px;
            }
            #pie {
                background-color:#ddf0a4;
                color:#ff0000;
                height:30px;
            }
        </style>
    </head>
    <body>
        
        <?php
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
         echo $conex ->server_info."<br>";
        echo $conex -> connect_errno."<br>";
        $error = $conex -> connect_errno;
        ?> 
        <div id="encabezado">
            <h1>Ejercicio: Conjuntos de resultados en MySQLi</h1>
             <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            
                 Producto: <select name="productos">
                <?php 
                if (!$error) {
                    $result = $conex->query("SELECT cod, nombre_corto FROM producto");
                    if (!$conex->errno) {
                        if ($result->num_rows) {
                            while ($fila = $result->fetch_array()) {
                                echo '<option value="' . $fila['cod']. '">' . $fila['nombre_corto'] . '</option>';
                            }
                        } 
                    }else {
                            echo 'Esto no anda';
                        }
                }
                ?>
                </select>
                <input type="submit" name="mostrar" value="Mostrar stock">
            </form>
        </div>
        <div id="contenido">
            <h1>Stock del producto en tiendas</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                
            <?php 
            if(!empty($_POST['productos']) && isset($_POST["mostrar"]) ){
                    $result = $conex->query('select ti.nombre, st.unidades, ti.cod from stock st join tienda ti where ti.cod=st.tienda and st.producto="' .  $_POST['productos'] . '"');
                        if($result){
                            while($fila = $result->fetch_array()){
                        
                            echo "Tienda: " . $fila['nombre'] . " : <input type='text' name='uni[]' value='$fila[unidades]'> unidades.<br>";
                            echo "<input type='hidden' name='producto' value='$_POST[productos]'>";
                            echo "<input type ='hidden' name ='codigoTienda[]' value ='$fila[cod]'>";

                            }
                            ?>
                        
                <input type="submit" value="Actualizar" name="actualizar">
            </form>
            <?php    
            }  
            }
                if(isset($_POST["actualizar"])){
                    $consult = $conex->stmt_init();
                    $consult->prepare('update stock set unidades=? where tienda=? and producto=?');
                    echo $consult->error;
                    $consult->bind_param('sss', $unidades, $tienda, $_POST['productos']);
                    echo $consult->error;
                    for($i=0; $i<count($_POST['uni']);$i++){
                        $unidades=$_POST['uni'][$i];
                        $tienda=$_POST['codigoTienda'][$i];
                        $consult->execute();
                        echo $consult->error;
                    }
                    echo 'Actualización realizada';
                    $consult->close();
                    $conex->close();
                    
                } 
                 ?>
            
        </div>
            
        
    </body>
</html>




