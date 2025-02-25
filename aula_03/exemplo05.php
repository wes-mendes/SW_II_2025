<?php
    
    function teste($x){
        foreach ($x as $nome) {
            echo "$nome <br>";
        }
    }


    $vetor = ['Wesley', 'Pedro', 'Lucas'];

    teste($vetor);

?>