<?php
    $nomes = ['ANA', 'WESLEY', 'TIAGO'];

    $qtde = count($nomes);

    echo "Elementos: $qtde <br>";

    for($i=0;$i<$qtde;$i++){
        echo $nomes[$i] . "<br>";
    }

    echo $nomes[1];

?>