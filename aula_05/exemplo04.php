<?php

    $json_str = '{"Tiago": 17, "Vini": 17, "Wes": 17}';
    $json_arr = json_decode($json_str, true);
    var_dump($json_arr);
?>