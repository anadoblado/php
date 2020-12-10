<?php

session_start();

if(!isset($_SESSION['nombre'])){
    header("location:index.php");
}else{
    
    setcookie('PHPSESSID', "", time() - 3, "/");
    session_unset();
    session_destroy();
    header("location:index.php");
    //echo $_SESSION['nombre'];
}

?>
