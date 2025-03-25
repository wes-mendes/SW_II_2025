<?php
    $empregados = array('empregados' => array(
        array(
            'nome' => 'Tiago',
            'idade' => 17,
            'genero' => 'M'
        ),
        array(
            'nome' => 'Vini',
            'idade' => 17,
            'genero' => 'M'
        ),
        array(
            'nome' => 'Wesley',
            'idade' => 17,
            'genero' => 'M'
        )));

    //converte para uma string Json
    $json_str = json_encode($empregados);

    //exibe a string json
    echo "$json_str";
?>