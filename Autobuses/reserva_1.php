<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reserva</title>
    </head>
    <body>
        <h2>AUTOBUSES XXX</h2>
        <?php
        if(isset($_POST['consultar'])){
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'autobuses');
            
             if ($conex->connect_errno) {
                echo "<h1>ERROR</h1>";
            } else {
                $result = $conex->query("SELECT * FROM viajes WHERE Fecha='$_POST[date]' and Origen='$_POST[origen]' and Destino='$_POST[destino]'");
                echo $conex -> error;
               // echo 'estoy en la linea 23';
                if(!$result->num_rows){
                    
                    ?>
        <h2>No existe este viaje</h2>              
        <form action="reserva_1.php">
            <input type="submit" name="volver" value="Volver al formulario">
        </form>
                        
                <?php
                    
                }else{
                    $obj = $result->fetch_object();
                ?>
    
                <form action="" method="POST">
                  
                  <?php 
                  echo"Fecha:"."<input type='date' name='date' value='$obj->Fecha' readonly><br>"; 
                  echo"Origen:"."<input type='text' name='origen' value='$obj->Origen' readonly><br>";
                  echo"Destino:"."<input type='text' name='destino' value='$obj->Destino' readonly><br>";
                  echo"Plazas disponibles:"."<input type='int' name='plazas' value='$obj->Plazas_libres' readonly><br>";
                  
                  if($obj->Plazas_libres <= 0){
                      //echo '<h2>No puedes reservar plazas en este viaje. Bus completo!!</h2>';
                       ?>
        <h2>No puedes reservar plazas en este viaje. Bus completo!!</h2>              
        <form action="reserva_1.php">
            <input type="submit" name="volver" value="Volver al formulario">
        </form>
                        
                <?php
                      
                  }else{
                      ?>
                    N. de plazas: <input type="int" name="plazasReserva"><br>
                    <input type="submit" name="reservar" value="Reservar">
                </form>
                  <?php
                  }
                  
                }
                               
            }
        } else {?>
        
        <form action="" method="post">
            Fecha: <input type="date" name="date"><br>
            Origen: <input type="text" name="origen"><br><!-- comment -->
            Destino: <input type="text" name="destino"><br>
            <input type="submit" name="consultar" value="Consultar">
        </form>
        
         <?php   
        } 
        ?>
        <?php 
            if(isset($_POST['reservar'])){
                if($_POST['plazas']>0 && $_POST['plazas'] >= $_POST['plazasReserva']){
                     
                    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'autobuses');
                     $result = $conex->stmt_init(); 
                     if ($conex->connect_errno) {
                     echo "<h1>ERROR</h1>";
                     }else{
                        $result -> prepare("UPDATE viajes SET Plazas_libres=? WHERE Fecha='$_POST[date]' and Origen='$_POST[origen]' and Destino='$_POST[destino]'");
                        $_POST['plazas']= $_POST['plazas']-$_POST['plazasReserva'];
                        $result->bind_param('i', $_POST['plazas']);
                        $result->execute();
                        $result->close();
                        $conex->close();
                        
                        ?>
        <h2>Reserva completada con éxito</h2>           
        <form action="reserva_1.php">
            <input type="submit" name="volver" value="Volver al formulario">
        </form>
                        
                <?php
                                
                 }
             } else {
                 
                 ?>
        <h2>No hay plazas disponibles</h2>             
                         
                <?php
             }
         }
        ?>
    </body>
</html>