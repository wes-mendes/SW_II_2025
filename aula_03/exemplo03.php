<?php
    // função sem parametros e com retorno

    function mensagem(){
        $a = "Wesley";
        return $a;
    }

    $frase = "Olá, ";
    $frase .= mensagem();

    echo $frase;

?>