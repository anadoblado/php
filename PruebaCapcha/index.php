<?php
session_start();
$message = '';
if (isset($_POST['securityCode']) && ($_POST['securityCode'] != "")) {
    if (strcasecmp($_SESSION['captcha'], $_POST['securityCode']) != 0) {
        $message = "Â¡Ha introducido un cÃ³digo de seguridad incorrecto! IntÃ©ntelo de nuevo.";
    } else {
        $message = "Ha introducido el cÃ³digo de seguridad correcto.";
    }
} else {
    $message = "Introduzca el cÃ³digo de seguridad.";
}
include('main/header.php');
?>
<title>Crea tu captcha para formulario PHP: Ejemplo completo</title> 
<script src="js/load_captcha.js"></script>
<?php include('main/container.php'); ?>
<div class="container">
    <h2>Crea tu captcha para formulario PHP</h2>
    <div class="row">			
        <div class="col-md-6">
            <div class="col-md-12">
                <form name="form" class="form" action="" method="post">	
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre">
                    </div>	
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Ingrese Email">
                    </div>					
                    <div class="form-group">
                        <label for="captcha" class="text-info">
                            <?php if ($message) { ?>
                                <span class="text-warning"><strong><?php echo $message; ?></strong></span>
                            <?php } ?>	
                        </label><br>
                        <input type="text" name="securityCode" id="securityCode" class="form-control" placeholder="CÃ³digo de seguridad">
                    </div>
                    <div class="form-group">								
                        <label class="col-md-4 control-label">	<img style="border: 1px solid #D3D0D0" src="get_captcha_1.php?rand=<?php echo rand(); ?>" id='captcha'></label>

                        <div class="col-md-8"><br>
                            <a href="javascript:void(0)" id="reloadCaptcha"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a> Recargar codigo
                        </div>

                    </div>	
                    <div class="clearfix"></div>									
                    <div class="form-group">	
                        <label class="col-md-4 control-label"><input type="submit" name="submit" class="btn btn-info btn-md" value="Enviar Formulario">	</label>							
                    </div>							
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("main/footer.php"); ?>