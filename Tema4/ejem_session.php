<?php

// debo iniciar la sesión para propagarla
session_start();
echo session_id() . "<br>";
echo "<br>";
echo session_name() . "<br>";
echo $_SESSION['nombre'];

// con esos métodos se elimina los datos de la sesión
//session_unset();
//session_destroy();

//setcookie("PHPSESSID", "", time()-3600);

// la cookie de sesión se crea en la raiz del dominio, hay que tener en cuenta el path
//setcookie("PHPSESSID", "yy");
//setcookie("PHPSESSID", "", time()-3600, "/");
setcookie("PHPSESSID", session_id(), time()+3600*24, "/");