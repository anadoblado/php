<?php
echo 'CONFIRMACION DE CLIENTE';
echo '<br>';
echo 'Nombre: '.$_POST['nombre'];
echo '<br>';
echo 'Apellidos: '.$_POST['apellidos'];
echo '<br>';
echo 'Direccion: '.$_POST['direccion'];
echo '<br>';
echo 'Nºtarjeta: '.$_POST['numtarjeta'];
?>
<form action="eje3Form1.php" method="post">
    <input type="submit" name="cancelar" value="Cancelar">
    <input type="submit" name="confirmar" value="Confirmar">
    <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
    <input type="hidden" name="apellidos" value="<?php echo $_POST['apellidos']; ?>">
</form>


