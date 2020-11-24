<?php
session_name();
            session_start();

if(!isset($_SESSION['nombre'])){
    header("location:login.php");
}else{
    
    echo $_SESSION['nombre'];
}



?>

