<?php
    $json_str = '{"empregados": '. 
    '[{"nome":"Tiago Carvalho", "idade":17, "sexo": "M"},'.
    '{"nome":"Pedro Henrique", "idade":17, "sexo": "M"},'.
    '{"nome":"Lucas Martins", "idade":17, "sexo": "M"}'.
    ']}';
    $jsonObj = json_decode($json_str);
    $empregados = $jsonObj->empregados;
    foreach ( $empregados as $e )
    {
    echo "nome: $e->nome - idade: $e->idade - sexo: $e->sexo<br>"; 
    }

?>