<?php
    $buscaEmail = $_GET["email"];
    $jsonUsuarios = file_get_contents("usuarios.json");
    $usuarios = json_decode($jsonUsuarios, true);
    $usuarioEncontrado = null;
    foreach ($usuarios as $usuario) {
      if ($usuario["email"] == $buscaEmail) {
        $usuarioEncontrado = $usuario;
      }
    }
    
    if ($usuarioEncontrado) {
      echo "Usuário encontrado:<br>";
      echo "Nome: " . $usuarioEncontrado["nome"] . "<br>";
      echo "Email: " . $usuarioEncontrado["email"] . "<br>";
    } else {
      echo "Usuário não encontrado.";
    }
?>