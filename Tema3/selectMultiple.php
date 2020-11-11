<form action="" method="post">
    Nombre: <input type="text" name="nombre"><br><!-- comment -->
    Apellidos: <input type="test" name="apellidos"><br><!-- comment -->
    <select multiple="" name="idiomas[]">
        <option value="1">Castellano</option>
        <option value="2">Francés</option><!-- comment -->
        <option value="4">Inglés</option><!-- comment -->
        <option value="8">Aleman</option>
    </select>
    <input type="submit" name="enviar" value="Enviar">
    <input type="submit" name="recuperar" value="Recuperar">
</form>


<?php


 if (isset($_POST['enviar'])){
     $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
     $idio = 0; // suma para sacar el número binario que después buscará en el array
     foreach ($_POST['idiomas'] as $value){
         $idio+=$value;
     }
     
     $dwes->query("INSERT INTO usuarios (Nombre, Apellidos, Idiomas) VALUES ('$_POST[nombre]', '$_POST[apellidos]', $idio)");
     echo $dwes->error;
 }

 
 if(isset($_POST['recuperar'])){
     $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
     $result = $dwes ->query("SELECT * FROM usuarios");
     while ($obj=$result->fetch_object()){
         $idio = explode(',', $obj->Idiomas); // pasamos de un String a un array para verlos por separado
         echo "Nombre: ".$obj->Nombre."<br>";
         echo "Apellidos: ".$obj->Apellidos."<br>";
         echo "Idiomas: ".$obj->Idiomas."<br>";
         
         foreach ($idio as $value){
             // aquí recorremos el array que hicimos con el explode
             echo"<br>".$value."</br>";
         }
     }
    
 }
?>