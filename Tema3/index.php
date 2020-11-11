<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo 1</title>
    </head>
    <body>
        <?php
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        
        echo $conex ->server_info."<br>";
        echo $conex -> connect_errno."<br>";
        $error = $conex -> connect_errno;
        //echo $conex -> connect_error."<br>";
        
        // cogemos el número de error para que sólo entre cuando no de error
        if (!$error){
            $conex ->autocommit(false);
           // $consulta1 = $conex ->query('UPDATE stock SET unidades=1 WHERE tienda=1 and producto="3DSNG"');
            //echo $conex -> error; // para ver el error que se ha producido, es un atributo, 
                                  //así que se va a sobreescribir con el último error
            
            //$consulta2 = $conex ->query('INSERT INTO stock values ("3DSNG",3,1)');
            //echo $conex -> error;
            
//            if ($consulta1 && $consulta2){
//                $conex ->commit();
//            }else{
//                echo 'No se pueden hacer los cambios';
//                $conex ->rollback();
//            }
            $resultado = $conex ->query("SELECT producto, unidades FROM stock WHERE unidades < 2");
            // aquí sólo cojo el primero del array
            //$stock = $resultado -> fetch_array();
//            $producto = $stock['producto'];
//            $unidades = $stock['unidades'];
//            print "<p> Producto $producto: $unidades unidades.</p>";
            
            // sacamos todos los registros del array y aquí tenemos un objeto
              $stock = $resultado -> fetch_object();
              while ($stock != null){
                  print"<p>Producto $stock->producto: $stock->unidades unidades.</p>";
                  $stock = $resultado->fetch_object();
              }
              
              $resultado2 = $conex ->query("SELECT * FROM producto");
              if(!$conex -> errno){
                  if($resultado2 -> num_rows){
                      while($fila = $resultado2->fetch_array()){
                          echo "Código: ".$fila['cod']."<br>";
                          echo "Nombre: ".$fila[2]."<br>";
                          echo "Precio: ".$fila['PVP']."<br>";
                          echo'<br>';
                      }
                  }
              }else{
                  echo "No se puede acceder";
              }
        }
        
        ?>
    </body>
</html>
