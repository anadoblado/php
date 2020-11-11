<html>
    <head>
        <title>title</title>
    </head>
    <body>
     <?php
        $conexion = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        $consulta1=$conexion->stmt_init();
        // esta es la consulta preparada
        $consulta1->prepare('INSERT INTO tienda (cod, nombre, tlf)VALUES(?,?,?)');
        
        if(!$consulta1->errno){
        $cod = 4;
        $nombre = "Tienda3"; 
        $telf = 12345;
        $consulta1->bind_param('isi', $cod, $nombre,$telf);
        $consulta1->execute();
        $cod = 5;
        $nombre = "Tienda4"; 
        $telf = 123455;
        $consulta1->execute();
       }
        $consulta1->close();
        
        
        $consulta2=$conexion->stmt_init();
        
        $consulta2->prepare('SELECT * FROM tienda');
        $consulta2->execute();
        $consulta2->bind_result($cod, $nombre,$telf);
        while($consulta2->fetch()){
            echo '<p>Codigo: ' .$cod.'</p>';
            echo '<p>Nombre: ' .$nombre.'</p>';
            echo '<p>Teléfono: ' .$telf.'</p>';
            echo '<p>';
        }
        $consulta2->close();
       // $conexion->close();
        
     ?>
    </body>
</html>


