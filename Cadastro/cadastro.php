<?php
include_once("../util.php");
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro</title>
<link rel="stylesheet" href="../global.css">
<link rel="stylesheet" href="style_cadas.css">
<link rel="shortcut icon" href="../favicon_io/favicon.ico" type="image/x-icon">
</head>

<body>
    
    
    <header>
        <div class="barra-vermelha">
            <div>
                <a href="../Index/index.php">Início</a>
                <a href="../Instituição/instituicao.php">Instituição</a>
                <a href="../Atividades/atividades.php">Atividades</a>
                <a href="../Comunicados/comunicados.php">Comunicados</a>
                <?php if (!isset($_SESSION['conectado']) || $_SESSION['conectado'] !== true): ?>
                    <a href="../Cadastro/cadastro.php">Administração de Comunicados</a>
                <?php endif; ?>
            </div>

            <div>
                <input type="text" placeholder="Buscar comunicados, eventos, termos...">
                <button>Buscar</button>
            </div>
        </div>
    </header>

    <main>
        <div class="main">
            <div class="box">
                <form action="" method="post">
                    <p id="p_email">E-mail institucional:</p>
                    <input id="email" type="email" name="email" placeholder="Digite o seu e-mail">
                    <p id="p_senha">Senha:</p>
                    <input id="senha" type="password" name="senha" placeholder="Digite sua senha">
                    <button id="btn_cadastro" type="submit">Enviar</button>
                </form>
            </div>
        </div>

        <?php
            // Verifica envio do formulário
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $usuario = isset($_POST['email']) ? trim($_POST['email']) : '';
                $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

                if (empty($usuario) || empty($senha)) {
                    echo '<script>alert("Preencha o e-mail e a senha.");</script>';
                } else {
                    // Ajuste: nome da tabela/colunas conforme seu banco de dados
                    // conforme informado: tabela `cadastro` com colunas `email` e `senha`
                    $table = 'cadastro';        // nome da tabela de usuários
                    $col_email = 'email';       // coluna do e-mail/RA
                    $col_password = 'senha';    // coluna da senha (hash ou texto)

                    // Prepara a consulta para verificar se o usuário existe
                    $sql = "SELECT id, $col_password FROM $table WHERE $col_email = ? LIMIT 1";

                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param('s', $usuario);
                        $stmt->execute();
                        $stmt->store_result();

                        if ($stmt->num_rows === 0) {
                            // Não existe usuário com este e-mail
                            echo '<script>alert("Usuário não cadastrado!");</script>';
                            $_SESSION['conectado'] = false;
                        } else {
                            $id = null;
                            $hash = null;
                            $stmt->bind_result($id, $hash);
                            $stmt->fetch();

                            // Suporta senha em hash (password_hash) ou texto puro
                            $password_ok = false;
                            if ($hash && password_verify($senha, $hash)) {
                                $password_ok = true;
                            } elseif ($hash && $senha === $hash) {
                                $password_ok = true; // caso a senha esteja armazenada em texto simples
                            }

                            if ($password_ok) {
                                // Login bem-sucedido
                                $_SESSION['conectado'] = true;
                                $_SESSION['usuario'] = $usuario;
                                header("Location: ../Index/index.php");
                                exit;
                            } else {
                                echo '<script>alert("Senha incorreta!");</script>';
                                $_SESSION['conectado'] = false;
                            }
                        }

                        $stmt->close();
                    } else {
                        // Erro na preparação da query (por exemplo tabela/coluna diferente)
                        echo '<script>alert("Erro ao acessar o banco de dados. Verifique o nome da tabela/colunas.");</script>';
                    }
                }
            }
        ?>

        <div vw class="enabled">
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
            new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>
        <script src="../global_search.js"></script>
    </main>

</body>

</html>
