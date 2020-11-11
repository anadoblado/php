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
                if(!$error){
                    $errorNum=0;
                    $productos = $conex->query("SELECT * FROM producto");
                    if(!$conex->errno){
                        if($productos->num_rows){
                            while($fila = $productos->fetch_array()){
                             // echo "Código: ".$fila['cod']."<br>";
                                $codigos = $fila['cod'];
                                 echo '<option value="'.$codigos.'">'.$fila['nombre_corto'].'</option>';
                            }
                        }
                    }
                }else{
                    $errorNum = 1;
                    echo 'Esto no anda';
                }
                
                ?>
                </select>
                <input type="submit" name="enviar" value="Mostrar stock">
            </form>
        </div>
        <div id="contenido">
            <h1>Stock del producto en tiendas</h1>
            <?php if(!empty($_POST['productos']) && $errorNum == 0){
                    $elemento = $_POST['productos'];
                    $consulta = $conex->query('select ti.nombre, st.unidades from stock st join tienda ti where ti.cod=st.tienda and st.producto="' . $elemento . '"');
                    if(!$conex->errno){
                        if($consulta->num_rows){
                            while($fila = $consulta->fetch_array()){
                                echo 'Tienda: '.$fila['nombre'].': '.$fila['unidades'].' unidades.<br>';
                            }
                        }
                    } else {
                        echo 'No se puede hacer la consulta';
                    }
                }?>
        </div>
            
        
    </body>
</html>




