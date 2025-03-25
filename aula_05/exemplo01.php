<?php

    $json_str = '{"nome": "Wesley", "idade": 17, "genero": "M"}';
    $obj = json_decode($json_str);
    echo "nome: $obj->nome <br>";
    echo "idade: $obj->idade <br>";
    echo "genero: $obj->genero <br>";
?>