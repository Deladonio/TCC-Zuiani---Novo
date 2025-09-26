<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Instituição-Zuiani</title>
<link rel="stylesheet" href="style_instt.css">
<link rel="shortcut icon" href="../favicon_io/favicon.ico" type="image/x-icon">
</head>

<body>

    <header>
        <?php session_start(); ?>
        <div class="barra-azul">
            <div>
                <a href="../Index/index.php">Início</a>
                <a href="../Instituição/instituicao.php">Instituição</a>
                <a href="../Atividades/atividades.php">Atividades</a>
                <a href="../Comunicados/comunicados.php">Comunicados</a>
                <?php if (!isset($_SESSION['conectado']) || $_SESSION['conectado'] !== true): ?>
                    <a href="../Cadastro/cadastro.php">Cadastro</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['conectado']) && $_SESSION['conectado'] === true): ?>
                    <a href="../Cadastro/logout.php" class="btn-logout">Sair</a>
                <?php endif; ?>
            </div>

            <div>
                <input type="text" placeholder="Buscar...">
                <button>Buscar</button>
            </div>
    
        </div>
    </header>

        
    <main class="main-instituicao">
        <section class="instituicao-hero">
            <h1>Nossa Instituição</h1>
            <p class="instituicao-desc">Conheça a história, missão e equipe da <span class="destaque">E.E. Dr. Luiz Zuiani</span></p>
        </section>
        <div class="container">
            <aside class="menu-lateral shadow">
                <h3 onclick="toggleInstituicao()">Instituição <span style="font-size:1.1em;">▼</span></h3>
                <ul id="submenu-instituicao" style="display: none;"></ul>
            </aside>
            <section class="conteudo" id="conteudo-dinamico">
                <!-- O conteúdo será carregado aqui -->
                <p>Selecione uma opção no menu lateral para ver o conteúdo.</p>
            </section>
        </div>
    </main>


    
</body>
<script src="script_inst.js"></script>
</html>
