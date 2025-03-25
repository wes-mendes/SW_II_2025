<?php
    $produtos = array('produtos' => array(
        array(
            "nome": "Computador",
            "preco": 100,
            "quant": 2
        ),
        array(
            "nome": "Monitor",
            "preco": 50,
            "quant": 10
        ),
        array(
            "nome": "Teclado",
            "preco": 25,
            "quant": 10
        )));
    $json_str = json_encode($produtos);
    file_put_contents('estoque.json', $json_str);
    echo "Estoque.json criado!!";
?>