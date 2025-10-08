<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Atividades</title>
<link rel="stylesheet" href="style_att.css">
<link rel="shortcut icon" href="../favicon_io/favicon.ico" type="image/x-icon">
</head>

<body>
   <header>
        <?php session_start(); ?>
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
                <input type="text" placeholder="Buscar...">
                <button>Buscar</button>
            </div>
    
        </div>
    </header>

    <main>
        <section class="atividades-destaque" style="text-align:center; padding: 36px 0 24px 0; background: #f8f8f8; border-radius: 14px; margin-bottom: 36px;">
            <h1 style="color: #C9201B; font-size: 2.4rem; margin-bottom: 10px;">Atividades Zuiani</h1>
            <p style="font-size: 1.18rem; max-width: 650px; margin: 0 auto 18px auto; color: #333;">Aqui você encontra oportunidades para desenvolver talentos, aprender novas habilidades e se divertir! Escolha sua atividade favorita e faça parte dos nossos projetos.</p>
            <a href="https://docs.google.com/forms/d/1GTfVKBD2kzCAdnnBHWL-HH170kiUzbuYRDnj_HeKdUI/edit"  target="_blank" class="botao-inscricao">Quero participar!</a>
        </section>

        <section class="atividades-grid" style="display: flex; flex-wrap: wrap; gap: 32px; justify-content: center;">
            <div class="atividade-card card-artes">
                <span class="atividade-icone">🎨</span>
                <h2>Oficina de Artes</h2>
                <p>Desenvolva a criatividade com pintura, desenho, escultura e outras técnicas artísticas.</p>
            </div>
            <div class="atividade-card card-reforco">
                <span class="atividade-icone">📚</span>
                <h2>Reforço Escolar</h2>
                <p>Aulas de apoio em matemática, português e ciências para melhorar o desempenho escolar.</p>
            </div>
            <div class="atividade-card card-esportes">
                <span class="atividade-icone">🏀</span>
                <h2>Esportes</h2>
                <p>Futebol, vôlei, basquete e outras modalidades para incentivar o trabalho em equipe e a saúde.</p>
            </div>
            <div class="atividade-card card-informatica">
                <span class="atividade-icone">💻</span>
                <h2>Informática</h2>
                <p>Aprenda noções básicas de computação, digitação e navegação segura na internet.</p>
            </div>
            <div class="atividade-card card-musica">
                <span class="atividade-icone">🎵</span>
                <h2>Música</h2>
                <p>Aulas de canto, violão e instrumentos para despertar o talento musical.</p>
            </div>
            <div class="atividade-card card-projetos">
                <span class="atividade-icone">🌟</span>
                <h2>Projetos Especiais</h2>
                <p>Participe de eventos, passeios culturais e projetos temáticos ao longo do ano.</p>
            </div>
        </section>
    </main>

    <br> <br> <br> <br> <br> <br> <br> <br> <br>

    <footer>
        <div class="footer-content">
            <div class="footer-text">
                <h3>Escola Dr. Luiz Zuiani</h3>
                <p>R. Aviador Gomes Ribeiro, 34-60 - P. Paulistano, Bauru - SP, 17030-530</p>
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

</body>

</html>
