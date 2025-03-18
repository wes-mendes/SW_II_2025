<?php
    $json_str = '{"Wesley":17,"Tiago":17,"Lucas":17}';
    $json_arr = json_decode($json_str, true);
    var_dump($json_arr);
?>