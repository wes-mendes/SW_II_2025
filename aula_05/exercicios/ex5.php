<?php
    $estoque = json_decode(file_get_contents('estoque.json'), true);
    $nomeProduto = "Caderno";
    $estoqueAntigo = $estoque;
    $estoqueNovo = array_filter($estoqueNovo, function($produto) use ($nomeProduto) {
        return $produto['nome'] != $nomeProduto;
    });

    file_put_contents('estoque.json', json_encode(array_values($estoqueNovo), JSON_PRETTY_PRINT));
    if (count($estoqueNovo) < count($estoqueAntigo)) {
        echo "Produto removido com sucesso!";
    } else {
        echo "Produto não encontrado ou não removido.";
    }
?>