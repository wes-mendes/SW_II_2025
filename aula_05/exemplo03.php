<?php
    $json_str = '{"empregados": '. 
    '[{"nome":"Tiago Carvalho", "idade":17, "sexo": "M", "dependentes": ["Vânia Estrada", "Pedro Carvalho"]},'.
    '{"nome":"Pedro Henrique", "idade":17, "sexo": "M"},'.
    '{"nome":"Lucas Martins", "idade":17, "sexo": "M"}'.
    '],
    "data": "15/12/2012"}';
    $jsonObj = json_decode($json_str);
    $empregados = $jsonObj->empregados;
    echo "<b>data do arquivo</b>: $jsonObj->data<br/>";
    foreach ( $empregados as $e ){
        echo "nome: $e->nome - idade: $e->idade - sexo: $e->sexo<br/>";
        if (property_exists($e, "dependentes")) { 
            $deps = $e->dependentes;
            echo "dependentes: <br/>";
            foreach ( $deps as $d ) echo "- $d<br/>";
        }
    }
?>