<?php
if (isset($_POST['enviar'])) {
    ?> 
    PEDIOS:
    <br>
    <form action="eje3Form2.php" method="post">
        Dirección: <input type="text" name="direccion"><br><!-- comment -->
        Nº de Tarjeta: <input type="text" name="numtarjeta"><br><!-- comment -->
        <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
        <input type="hidden" name="apellidos" value="<?php echo $_POST['apellidos']; ?>">
        <input type="submit" name="enviar" value="Siguiente">
    </form>
    <?php
} else {
    ?>
        DATOS:<!--  -->
        <br>
        <form action="" method="post">
            Nombre: <input type="text" name="nombre" 
            <?php 
            if(isset($_POST['cancelar'])){
                echo 'value="'.$_POST['nombre'].'"';
            } ?>"><br><!-- comment -->
            Apellidos: <input type="text" name="apellidos" <?php
            if(isset($_POST['cancelar'])){
                echo 'value="'.$_POST['apellidos'].'"';
            } ?>"><br>
            <input type="submit" name="enviar" value="Siguiente">
        </form>

        <?php
    }
    ?>
    






