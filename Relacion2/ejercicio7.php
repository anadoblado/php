<?php

echo "Crea un array con los nombres Pedro, Ismael, Sonia, Clara, Susana, Alfonso y
Teresa. 
Muestra el número de elementos que contiene y cada elemento en una lista
no numerada.";
echo "<br>";
echo "<br>";

$nombres = array("Pedro", "Ismael", "Sonia", 
    "Clara", "Susana", "Alfonso", "Teresa");

//print_r(array_count_values($nombres));

//print_r(count($nombres));
echo "El array tiene ".count($nombres)." valores"."<br>";
echo "Lista de nombres: "."<br>";


echo "<ul>";
foreach ($nombres as $valores){
    echo "<li>".$valores."</li>";
}
echo "</ul>";


