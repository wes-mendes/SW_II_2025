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
    $json_str = json_encode($empregados);
    echo "$json_str";
?>