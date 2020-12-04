<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './dadoPoker.php';
        $dado1=new DadoPoker();
        $tirada=DadoPoker::tirar($dado1);
        echo "Tirada del dado1: ". $tirada."<br>";
        echo DadoPoker::getTiradas()."<br>";
        
        $dado2=new DadoPoker();
        $tirada=DadoPoker::tirar($dado2);
        echo "Tirada del dado2: ". $tirada."<br>";
        echo DadoPoker::getTiradas()."<br>";
        
        $dado3=new DadoPoker();
        $tirada=DadoPoker::tirar($dado3);
        echo "Tirada del dado3: ". $tirada."<br>";
        echo DadoPoker::getTiradas()."<br>";
        
        $dado4=new DadoPoker();
        $tirada=DadoPoker::tirar($dado4);
        echo "Tirada del dado4: ". $tirada."<br>";
        echo DadoPoker::getTiradas()."<br>";
        
        $dado5=new DadoPoker();
        $tirada=DadoPoker::tirar($dado5);
        echo "Tirada del dado5: ". $tirada."<br>";
        echo DadoPoker::getTiradas()."<br>";
        
        echo DadoPoker::getTiradas();
        
        ?>
    </body>
</html>
