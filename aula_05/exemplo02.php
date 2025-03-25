<?php
    $json_str = '{"empregados": '.
    '[{"nome": "Wesley", "idade": 17, "genero": "M"},'.
    '{"nome": "Pedro", "idade": 17, "genero": "M"},'.
    '{"nome": "Iago", "idade": 17, "genero": "M"}'.
    ']}';
    $jsonObj = json_decode($json_str);
    $empregados = $jsonObj->empregados;
    foreach ( $empregados as $e ){
        echo "nome: $e->nome - idade: $e->idade - genero $e->genero <br>";
    }
?>