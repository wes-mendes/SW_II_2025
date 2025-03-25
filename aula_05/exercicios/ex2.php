<?php
    $usuarios = file_get_contents("usuarios.json");
    $dadosUsuarios = json_decode($usuarios, true);
    print_r($dadosUsuarios);
?>