
<?php
$conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
if ($conex->connect_errno) {
    echo "<h1>ERROR</h1>";
} else {
    $result = $conex->query('SELECT * FROM jugadores');
    echo '<table border="1">';
        echo ' <th>Nombre</th>';
        echo ' <th>DNI</th>';
        echo ' <th>Dorsal</th>';
        echo '<th>Posición</th>';
        echo ' <th>Equipo</th>';
        echo '<th>Goles</th>';
        
        while ($obj = $result->fetch_object()) {
        //$pos = explode(',', $obj->Posicion);
        echo'<tr>';
        echo'<td>'.$obj->Nombre.'</td>';
        echo'<td>'.$obj->DNI.'</td>';
        echo'<td>'.$obj->Dorsal.'</td>';
        echo'<td>'.$obj->Posicion.'</td>';
        //ESTÁ COMENTADO PORQUE ASÍ ME SACA UN VALOR EN CADA CELDA, Y ES UN SELECT MÚLTIPLE
//        foreach ($pos as $value){
//            echo '<td>'.$value.'</td>';  
//        }
        echo'<td>'.$obj->Equipo.'</td>';
        echo'<td>'.$obj->Goles.'</td>';
    }
        echo '</table>';?>
<form action="index.php">
    <input type="submit" value="Volver al menú" name="volver" />
</form>
            <?php
        
        //echo "<a href='index.php'>Volver al menú</a>";
}
?>


