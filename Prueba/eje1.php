<?php
//    $a = $b = "3.1416";
//    settype($b, "float");
//    print "\$a vale $a y es de tipo ".gettype($a);
//    print "<br/>";
//    print "\$b vale $b y es de tipo ".gettype($b);
//    print "\$a es de tipo String?  ". is_string($a);
//    print "<br/>";
//    echo date_default_timezone_get();
//    print "<br/>";
//    echo date ("d - M - Y");
    print "<br/>";
    
  
    
    switch (date("N")){
        case 1:
            $a = "Lunes";
            break;
        case 2:
            $a = "Martes";
            break;
         case 3:
            $a = "Miércoles";
            break;
        case 4:
            $a = "Jueves";
            break;
         case 5:
            $a = "Viernes";
            break;
        case 6:
            $a = "Sábado";
            break;
        case 7:
            $a = "Domingo";
            break;
    }
    
    switch (date ("n")){
        case 1:
            $b = "Enero";
            break;
        case 2:
            $b = "Febrero";
            break;
        case 3:
            $b = "Marzo";
            break;
        case 4:
            $b = "Abril";
            break;
        case 5:
            $b = "Mayo";
            break;
        case 6:
            $b = "Junio";
            break;
        case 7:
            $b = "Julio";
            break;
        case 8:
            $b = "Agosto";
            break;
        case 9:
            $b = "Septiembre";
            break;
        case 10:
            $b = "Octubre";
            break;
        case 11:
            $b = "Noviembre";
            break;
        case 12:
            $b = "Diciembre";
            break;
        
        
    }
    
    echo date("N, d - F - Y");
    echo("<br>");
    echo $a.", ". date("d")." de ".$b." de ".date("Y");
 

