<?php
session_name();
session_start();

if(!isset($_SESSION['nombre'])){
    header("location:login.php");
}else{
    
    setcookie('PHPSESSID', "", time() - 3, "/");
    session_unset();
    session_destroy();
    header("location:login.php");
    //echo $_SESSION['nombre'];
}

?>
