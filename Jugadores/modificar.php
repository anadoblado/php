<html>
    <head>
        <title>Cambiar</title>
    </head>
    <body>
        <h2>Modificar jugador</h2>
        <?php
        if (isset($_POST['buscar']) && preg_match('/^[0-9]{8}[a-z]{1}$/i', $_POST['dni'])) {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
            if ($conex->connect_errno) {
                echo "<h1>ERROR</h1>";
            } else {
                $busqueda = $conex->query("SELECT * FROM jugadores WHERE DNI='$_POST[dni]'");
                echo '<h2>Jugador para modificar</h2>';
                
                $obj = $busqueda->fetch_object();
                $pos = explode(',', $obj->Posicion);
                ?>
    
                <form action="" method="POST">
                  
                  <?php 
                  echo"Nombre:"."<input type='text' name='nombre' value='$obj->Nombre'><br>"; 
                  echo"DNI:"."<input type='text' name='dni' value='$obj->DNI' readonly><br>";
                  echo"Equipo:"."<input type='text' name='equipo' value='$obj->Equipo'><br>";
                  echo"Número de goles:"."<input type='int' name='goles' value='$obj->Goles'><br>";
                  ?>
                    
                  
                    
                    Dorsal: <select name="dorsal">
                        <?php
                            for($i = 1; $i <=11; $i++){
                                echo" <option value='$i'"; 
                                if($obj->Dorsal == $i){
                                    echo 'selected';
                                }
                                echo ">".$i."</option>";
                            }
                        ?>
                    </select><br>
                   
                    Posición: <select multiple="" name=posicion[]">
 
                    <option value="1" <?php
                        if(in_array("Portero", $pos)){
                            echo"selected";
                        }
                        ?> >Portero</option>
                    <option value="2" <?php
                        if(in_array("Defensa", $pos)){
                            echo"selected";
                        }
                        ?>>Defensa</option>
                    <option value="4" <?php
                        if(in_array("Centrocampista", $pos)){
                            echo"selected";
                        }
                        ?>>Centrocampista</option>
                    <option value="8" <?php
                        if(in_array("Delantero", $pos)){
                            echo"selected";
                        }
                        ?>>Delantero</option>
                    </select> <br> 
                    
                   
                    <input type="submit" name="modificar" value="Modificar">
                
                </form>
        
                  <?php  
                }
                //$conex->query("INSERT INTO jugadores (Nombre, DNI, Dorsal, Posicion, Equipo, Goles) VALUES ('$_POST[nombre]', '$_POST[dni]', '$_POST[dorsal]', $pos, '$_POST[equipo]', '$_POST[goles]')");

                ?>
        
               


                <?php
            
        } else {
            ?>
            <form action="" method="post">
                DNI: <input type="text" name="dni"><br><!-- comment -->
                <?php
                if (isset($_POST['enviar']) && !preg_match('/^[0-9]{8}[a-z]{1}$/i', $_POST['dni'])) {
                    echo '<span style="color:red">Debe introducir un DNI con formato 12345678Z</span><br>';
                }
                ?>   
                <input type="submit" name="buscar" value="Buscar">
                
            </form>
                <form action="index.php">
                    <input type="submit" value="Volver al menú" name="volver"  />
                </form>

            <?php
        }
        ?>
        
        <?php
            if(isset($_POST['modificar'])  && preg_match('/^[a-z]{1,100}$/i', $_POST['nombre']) && preg_match('/^[0-9]{8}[a-z]{1}$/i', $_POST['dni']) && preg_match('/^[0-9]{1}/', $_POST['dorsal']) && !empty($_POST['posicion']) && !empty($_POST['equipo']) && preg_match('/^\d{1,3}/', $_POST['goles'])){
                 $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
                 $result = $conex->stmt_init(); 
                 if ($conex->connect_errno) {
                 echo "<h1>ERROR</h1>";
                } else {
                    $result->prepare("UPDATE jugadores SET Nombre=?, Dorsal=?, Posicion=?, Equipo=?, Goles=? WHERE DNI='$_POST[dni]'");
                    $pos = 0;
                    foreach ($_POST['posicion'] as $value) {
                       $pos += $value ;
                }
                $result->bind_param('sissi', $_POST['nombre'], $_POST['dorsal'], $pos, $_POST['equipo'], $_POST['goles'] );
                $result->execute();
                $result->close();
                $conex->close();
                // para rederigir cuando ya hemos modificado el registro
                header('Location: mostrar.php');
               
                
                }
            }else if(isset($_POST['modificar'])  && !preg_match('/^[a-z]{1,100}$/i', $_POST['nombre'])){
                echo '<span style="color:red">El nombre no está bien escrito o no puede quedar vacio</span>';
            }else if(isset ($_POST['modificar']) && !preg_match('/^[0-9]{1}/', $_POST['dorsal'])){
                 echo '<span style="color:red">Hay que elegir un número de dorsal</span>';
            }else if (isset ($_POST['modificar']) && !empty($_POST['posicion'])) {
                echo '<span style="color:red">Hay que elegir una posción</span>';
            }else if(isset ($_POST['modificar'])&& !empty($_POST['equipo'])){
                 echo '<span style="color:red">Hay que elegir un equipo</span>';
            }else if(isset ($_POST['modificar']) && preg_match('/^\d{1,3}/', $_POST['goles'])){
                 echo '<span style="color:red">Hay que elegir el número de goles</span>';
            }
        ?>
    </body>
</html>











