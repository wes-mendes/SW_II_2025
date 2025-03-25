<?php
    $json_str = '{"empregados": '.
    '[{"nome": "Wesley", "idade": 17, "genero": "M", "dependentes": ["Tiago","Lucas"]},'.
    '{"nome": "Pedro", "idade": 17, "genero": "M"},'.
    '{"nome": "Iago", "idade": 17, "genero": "M"}'.
    '],
    "data": "15/12/2012"}';
    $jsonObj = json_decode($json_str);
    $empregados = $jsonObj->empregados;
    echo "data do arquivo:<br> $jsonObj->data<br><br>";
    foreach ( $empregados as $e ){
        echo "nome: $e->nome - idade: $e->idade - genero $e->genero <br>";
        if (property_exists($e, "dependentes")){
            $deps = $e->dependentes;
            echo "dependentes: <br>";
            foreach ($deps as $d) {
                echo "- $d<br>";
            }
        }
    }
?>