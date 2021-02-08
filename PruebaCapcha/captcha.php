<?php
$caracteres_permitidos = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

function generar_cadena($input, $longitud) {
    $input_lenght = strlen($input);
    $random_string = '';
    for($i = 0; $i < $longitud; $i ++){
        $random_character = $input[mt_rand(0, $input_lenght - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
$string_lenght = 6;
$captcha_string = generar_cadena($caracteres_permitidos, $string_lenght);
echo $captcha_string;



?>
