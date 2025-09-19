<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro</title>
<link rel="stylesheet" href="style_cadas.css">
<link rel="shortcut icon" href="../favicon_io/favicon.ico" type="image/x-icon">
</head>

<body>
    
    <?php session_start(); ?>
    <header>
        <div class="barra-vermelha">
            <div>
                <a href="../Index/index.php">Início</a>
                <a href="../Instituição/instituicao.php">Instituição</a>
                <a href="../Atividades/atividades.php">Atividades</a>
                <a href="../Comunicados/comunicados.php">Comunicados</a>
                <?php if (!isset($_SESSION['conectado']) || $_SESSION['conectado'] !== true): ?>
                    <a href="../Cadastro/cadastro.php">Cadastro</a>
                <?php endif; ?>
            </div>

            <div>
                <input type="text" placeholder="Buscar...">
                <button>Buscar</button>
            </div>
        </div>
    </header>

    <main>
        <div class="main">
            <div class="box">
                <form action="" method="post">
                    <p id="p_email">E-mail institucional:</p>
                    <input id="email" type="text" name="email" placeholder="Digite o seu RA">
                    <p id="p_senha">Senha:</p>
                    <input id="senha" type="password" name="senha" placeholder="Digite sua senha">
                    <button id="btn_cadastro" type="submit">Enviar</button>
                </form>
            </div>
        </div>

        <?php
            session_start(); //inicia a sessão
            if ($_POST)
            {
                $usuario = $_POST['email'];
                $senha = $_POST['senha'];
            
                if ($usuario == "honda" and $senha == "123")
            {
                    echo "Conectado com sucesso! <br>";
                    echo "Usuário: $usuario <br>";
                    echo "Senha: $senha <br>";
                    $_SESSION['conectado'] = true; //cria a sessão
                    $_SESSION['usuario'] = $usuario;
            }   
            else 
            {
                echo "Usuário ou senha inválidos! <br>";
                $_SESSION['conectado'] = false;
                $_SESSION['login'] = "";
            }

            header("Location: ../Comunicados/comunicados.php"); //redireciona para comunicados.php
        }
        ?>
    </main>

</body>

</html>
