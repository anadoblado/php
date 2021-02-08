<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        session_start();

        $caracteres_permitidos = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        function generar_cadena($input, $longitud) {
            $input_lenght = strlen($input);
            $random_string = '';
            for ($i = 0; $i < $longitud; $i++) {
                $random_character = $input[mt_rand(0, $input_lenght - 1)];
                $random_string .= $random_character;
            }
            return $random_string;
        }

        if (!isset($_SESSION['captcha']) || isset($_POST['actualizar'])) {
            $string_lenght = 6;
            $captcha_string = generar_cadena($caracteres_permitidos, $string_lenght);
            $_SESSION['captcha'] = $captcha_string;
        }
        if (isset($_POST['code'])) {
            if ($_POST['code'] == $_SESSION['captcha']) {
                session_destroy();
                echo "Captcha valid";
                
            } else {
                echo "Captcha NOT valid";
                echo $_POST['code'];
                echo $_SESSION['captcha'];
            }
        }
        ?>

        <form action="" method="post">
            <div class="text-center text-md-right m-3">
                <p>Introduce los caracteres: <?php echo $_SESSION['captcha']; ?>
                </p><button name="actualizar">Acctualiza</i></button>
                <p><input type="text" name="code" /> <input type="submit" value="Submit" />

            </div>
        </form>

        <?php
        ?>
    </body>
</html>


