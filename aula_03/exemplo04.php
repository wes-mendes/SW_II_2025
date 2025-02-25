<?php
    // função sem parametros e com retorno

    function mensagem($x){
        $a = "Wesley".$x;
        return $a;
    }

    $sobrenome = "Mendes";

    $frase = "Olá, ";
    $frase .= mensagem($sobrenome);
    $frase .= "bem vindo";

    echo $frase;

?>