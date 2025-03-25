<?php
    $estoque = file_get_contents("estoque.json");
    $produtosEst = json_decode($estoque, true);
    $novoProd = array("nome" => "Mouse", "preco" => 15, "quantidade" => 10);
    $produtosEst[] = $novoProd;
    $jsonNovo = json_encode($produtosEst, JSON_PRETTY_PRINT);
    file_put_contents("estoque.json", $jsonNovo);
    echo "Produto adicionado em estoque.json";
?>