<?php
include_once("../util.php");
session_start();

// Processa exclusão de post (apenas quando usuário está conectado)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id']) && !empty($_SESSION['conectado'])) {
    $delete_id = intval($_POST['delete_id']);
    $sql_del = "DELETE FROM posts WHERE id = ? LIMIT 1";
    if ($stmt_del = $conn->prepare($sql_del)) {
        $stmt_del->bind_param('i', $delete_id);
        $stmt_del->execute();
        $stmt_del->close();
    }
    // Após exclusão, redireciona para evitar reenvio do form
    header('Location: comunicados.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunicados</title>
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="style_comu.css">
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
                    <a href="../Cadastro/cadastro.php">Cadastro</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['conectado']) && $_SESSION['conectado'] === true): ?>
                    <a href="../Cadastro/logout.php" class="btn-logout">Sair</a>
                <?php endif; ?>
            </div>

            <div>
                <form class="search-input" action="/TCC-Zuiani---Novo-main/search.php" method="get" role="search">
                    <svg width="20" height="20" viewBox="0 0 24 24" style="margin-right:8px;color:#64748b;" aria-hidden="true">
                    <path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5
                        6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19
                        l-4.99-5zM10 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                    </svg>
                    <input id="q" name="q" type="search" placeholder="Buscar comunicados, eventos, termos..." 
                    value="" aria-label="Buscar comunicados">
                    <button class="search-btn" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </header>
    
    <main>
        <div class="comunicados-container">
            <div class="header-comunicados">
                <?php if (!empty($_SESSION['conectado'])): ?>
                    <a class='btn-adicionar' href='adicionar_comu.php'>Adicionar Comunicado</a>
                <?php endif; ?>
            </div>

            <?php
                // Busca os posts na tabela `posts`
                $sql = "SELECT id, titulo, conteudo FROM posts ORDER BY id DESC";
                if ($result = $conn->query($sql)) {
                    if ($result->num_rows === 0) {
                        echo "<p>Não há comunicados no momento.</p>";
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            $id = (int) $row['id'];
                            $titulo = htmlspecialchars($row['titulo'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
                            $conteudo = nl2br(htmlspecialchars($row['conteudo'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));
                            // adiciona id para permitir âncoras diretas a partir da busca
                            echo "<div class='comunicado-item' id='post-{$id}'>";
                            echo "<h3>{$titulo}</h3>";
                            echo "<p>{$conteudo}</p>";

                            // Botão excluir visível apenas para usuários conectados
                            if (!empty($_SESSION['conectado'])) {
                                echo "<form method='post' onsubmit=\"return confirm('Confirmar exclusão deste comunicado?');\" style='display:inline-block;margin-top:8px;'>";
                                echo "<input type='hidden' name='delete_id' value='{$id}'>";
                                echo "<button type='submit' class='btn-excluir'>Excluir</button>";
                                echo "</form>";
                            }

                            echo "</div>";
                        }
                    }
                    $result->free();
                } else {
                    echo "<p>Erro ao carregar comunicados.</p>";
                }
            ?>
        </div>

        <div vw class="enabled">
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
            new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>
    </main>
            <script src="../global_search.js"></script>
    
    <br> <br> <br> <br> <br> <br> <br> <br>

    <footer>
        <div class="footer-content">
            <div class="footer-text">
                <h3>Escola Dr. Luiz Zuiani</h3>
                <p>R. Aviador Gomes Ribeiro, 34-60 - P. Paulistano, Bauru - SP, 17030-530</p>
                <p>Telefone: (14) 3203-2553</p>
            </div>

            <div class="social-midia">
                <!-- Facebook -->
                <a href="https://web.facebook.com/EscolaZuiani/about" target="_blank" class="social-icone facebook" title="Facebook">
                    <svg viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>

                <!-- Instagram -->
                <a href="https://www.instagram.com/escola_zuiani_bauru/" target="_blank" class="social-icone instagram" title="Instagram">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>

                <!-- E-mail -->
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=e025276a@educacao.sp.gov.br" target="_blank" class="social-icone email" title="E-mail">
                    <svg viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                </a>
            </div>

            <div class="copyright">
                <p>&copy; 2025 Dr. Luiz Zuiani. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>


<script src="script_comu.js"></script>
</body>

</html>
