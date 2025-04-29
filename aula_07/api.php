<?php
    header("Content-Type: application/json");
    $metodo = $_SERVER['REQUEST_METHOD'];
    $arquivo = 'usuarios.json';
    if(!file_exists($arquivo)){
        file_put_contents($arquivos, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    $usuarios = json_decode(file_get_contents($arquivo), true);
    switch ($metodo) {
        case 'GET':
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $usuario_encontrado = null;
                foreach ($usuarios as $usuario) {
                    if($usuario['id'] == $id){
                        $usuario_encontrado = $usuario;
                        break;
                    }
                }

                if ($usuario_encontrado) {
                    echo json_encode($usuario_encontrado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                }
                else {
                    http_response_code(404);
                    echo json_encode(["erro" => "O usuário requerido não foi encontrado."], JSON_UNESCAPED_UNICODE);
                }
            }
            else{
                echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
            break;        

        case 'POST':
            $dados = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($dados["nome"]) || !isset($dados["email"])) {
                http_response_code(400);
                echo json_encode(["erro" => "O nome e o email são obrigatórios, por favor."], JSON_UNESCAPED_UNICODE);
                exit;
            }
            $novo_id = 1;

            if (!empty($usuarios)) {
                $ids = array_column($usuarios, 'id');
                $novo_id = max($ids) + 1;
            }
            $novoUsuario = [
                "id" => $novo_id,
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];
            $usuarios[] = $novoUsuario;
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            echo json_encode([
                "mensagem" => "O usuário foi adicionado com sucesso.",
                "usuario" => $novoUsuario
            ], JSON_UNESCAPED_UNICODE);            

            break;      

        default:
            http_response_code(405);
            echo json_encode(["erro" => "O método requerido não é permitido"], JSON_UNESCAPED_UNICODE);
            break;
            case 'PUT':
                $dados = json_decode(file_get_contents('php://input'), true);
                
                if (!isset($dados["id"]) || !isset($dados["nome"]) || !isset($dados["email"])) {
                    http_response_code(400);
                    echo json_encode(["erro" => "O ID, nome e email são obrigatórios para atualizar."], JSON_UNESCAPED_UNICODE);
                    exit;
                }
                
                $id = intval($dados["id"]);
                $usuario_encontrado = null;
                foreach ($usuarios as &$usuario) {
                    if ($usuario['id'] == $id) {
                        $usuario['nome'] = $dados["nome"];
                        $usuario['email'] = $dados["email"];
                        $usuario_encontrado = $usuario;
                        break;
                    }
                }
                
                if ($usuario_encontrado) {
                    file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                    echo json_encode([
                        "mensagem" => "Usuário atualizado com sucesso.",
                        "usuario" => $usuario_encontrado
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    http_response_code(404);
                    echo json_encode(["erro" => "Usuário não encontrado para o ID fornecido."], JSON_UNESCAPED_UNICODE);
                }
                break;
                case 'DELETE':
                    if (!isset($_GET['id'])) {
                        http_response_code(400);
                        echo json_encode(["erro" => "O ID do usuário é obrigatório."], JSON_UNESCAPED_UNICODE);
                        exit;
                    }
                    
                    $id = intval($_GET['id']);
                    $usuario_encontrado = false;
                    foreach ($usuarios as $key => $usuario) {
                        if ($usuario['id'] == $id) {
                            unset($usuarios[$key]);
                            $usuario_encontrado = true;
                            break;
                        }
                    }
                    
                    if ($usuario_encontrado) {
                        $usuarios = array_values($usuarios);
                        file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        echo json_encode(["mensagem" => "Usuário excluído com sucesso."], JSON_UNESCAPED_UNICODE);
                    } else {
                        http_response_code(404);
                        echo json_encode(["erro" => "Usuário não encontrado para o ID fornecido."], JSON_UNESCAPED_UNICODE);
                    }
                    break;        
    }
?>