<?php

//Desplegaremos con $server->service nuestro servicio web
$server=file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Lucena,es&APPID=74063a3fc05b741d16adfa32bb5a554a&lang=es&units=metric");
$tiempo= json_decode($server);
var_dump($tiempo);
echo "<hr>";
echo "<h3>Datos sueltos: </h3>";
echo "Nombre: ".$tiempo->name."<br>";
echo "Temperatura: ".$tiempo->main->temp."ºC<br>"; //$tiempo->{"main"}->{"temp"}
echo "Humedad: ".$tiempo->main->humidity."%<br>";
echo "Icono: ".$tiempo->weather[0]->icon."<br>";
echo "Presión: ".$tiempo->main->pressure."mb<br>";

?>
<img src="http://openweathermap.org/img/wn/<?php echo $tiempo->weather[0]->icon;?>.png" alt="alt"/>


