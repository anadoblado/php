<?php

//Desplegaremos con $server->service nuestro servicio web
//$server=file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Lucena,es&APPID=74063a3fc05b741d16adfa32bb5a554a&lang=es&units=metric");
//$server=file_get_contents("http://pro.openweathermap.org/data/2.5/forecast/hourly?q=Lucena,es&APPID=74063a3fc05b741d16adfa32bb5a554a&lang=es&units=metric");
//pro.openweathermap.org/data/2.5/forecast/hourly?q={city name}&appid={API key}
$server=file_get_contents("https://tile.openweathermap.org/map/precipitation_new/3/40.4167/-3.70325.png?APPID=74063a3fc05b741d16adfa32bb5a554a");
//http://maps.openweathermap.org/maps/2.0/weather/TA2/{z}/{x}/{y}?date=1527811200&opacity=0.9&fill_bound=true&appid={API key}
//$server=file_get_contents("https://tile.openweathermap.org/maps/2.0/weather/{PAC0}/{3}/{0}/{0}?appid=74063a3fc05b741d16adfa32bb5a554a");
//http://maps.openweathermap.org/maps/2.0/weather/{op}/{z}/{x}/{y}&appid={API key}

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


