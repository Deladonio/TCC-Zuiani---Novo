<?php
include_once("util.php");
// Recebe parâmetro q via GET
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultados da Busca</title>
    <link rel="stylesheet" href="global.css">
    <style>
        /* Estilos para busca mais agradável */
        .search-header { padding: 24px 16px; background: linear-gradient(90deg,#f7f9fc,#eef4ff); border-bottom: 1px solid #e6eefc; }
        .search-bar { max-width: 900px; margin: 0 auto; display:flex; gap:8px; align-items:center; }
        .search-input { flex:1; display:flex; align-items:center; background:#fff; padding:10px 12px; border-radius: 10px; box-shadow: 0 6px 18px rgba(30,60,120,0.06); border:1px solid #e2e8f0; }
        .search-input input { border:0; outline:none; font-size:16px; width:100%; padding:6px 8px; }
        .search-btn { background:#1976d2; color:#fff; border:none; padding:10px 16px; border-radius:8px; cursor:pointer; font-weight:600; }
        .back-btn { background:#64748b; color:#fff; border:none; padding:10px 16px; border-radius:8px; cursor:pointer; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:6px; }
        .back-btn:hover { background:#475569; }
        .search-btn:hover { background:#1565c0; }
        .search-meta { max-width:900px; margin:18px auto 0 auto; color:#334155; }
        .results { max-width:900px; margin:16px auto 60px auto; }
        .result-card { background:#fff; border-radius:10px; padding:14px; box-shadow: 0 6px 18px rgba(20,40,80,0.04); border:1px solid #eef2ff; margin-bottom:12px; }
        .result-card h3 { margin:0 0 6px 0; color:#0f172a; }
        .result-card p { margin:0; color:#475569; }
        mark.search-hit { background:#ffeb99; padding:0 2px; border-radius:3px; }
        .no-results { max-width:900px; margin: 12px auto; color:#475569; }
        .back-link { display:block; max-width:900px; margin:14px auto; }
        @media (max-width:640px){ .search-bar{padding:0 8px;} }
    </style>
</head>
<body>
    <header class="search-header">
        <div class="search-bar">
            <form class="search-input" action="search.php" method="get" role="search">
                <svg width="20" height="20" viewBox="0 0 24 24" style="margin-right:8px;color:#64748b;" aria-hidden="true"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM10 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/></svg>
                <input id="q" name="q" type="search" placeholder="Buscar comunicados, eventos, termos..." value="<?php echo htmlspecialchars($q, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" aria-label="Buscar comunicados">
                <button class="search-btn" type="submit">Buscar</button>
            </form>
            <a href="Index/index.php" class="back-btn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Voltar
            </a>
        </div>
        <div class="search-meta">
            <small>Pesquise por título ou conteúdo no site.</small>
        </div>
    </header>
    <main>
        <div class="results">
        <h1 style="max-width:900px;margin:18px auto 6px auto;">Resultados da busca</h1>
        <?php if ($q === ''): ?>
            <div class="no-results">Digite um termo acima para no site.</div>
        <?php else: ?>
            <div class="search-meta">Buscando por: <strong><?php echo htmlspecialchars($q, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></strong></div>
            <?php
                // --- Busca em arquivos do site inteiro ---
                $fileResults = [];
                // Não varrer a raiz '.' para evitar duplicatas; listar pastas principais
                $searchDirs = ['Index','Instituição','Atividades','Comunicados','Cadastro'];
                $needle = mb_strtolower($q, 'UTF-8');
                foreach ($searchDirs as $d) {
                    $dirPath = __DIR__ . DIRECTORY_SEPARATOR . $d;
                    if (!is_dir($dirPath)) continue;
                    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dirPath));
                    foreach ($it as $file) {
                        if (!$file->isFile()) continue;
                        $ext = strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
                        if (!in_array($ext, ['php','html','htm','txt'])) continue;
                        $fp = $file->getPathname();
                        // evitar pesquisar neste próprio arquivo de resultados
                        if (realpath($fp) === realpath(__FILE__)) continue;
                        $contents = @file_get_contents($fp);
                        if ($contents === false) continue;
                        $text = trim(strip_tags($contents));
                        $lowerText = mb_strtolower($text, 'UTF-8');
                        $pos = mb_stripos($lowerText, $needle, 0, 'UTF-8');
                        if ($pos !== false) {
                            $start = max(0, $pos - 80);
                            $snippet = mb_substr($text, $start, 300, 'UTF-8');
                            if ($start > 0) $snippet = '...' . $snippet;
                            if (mb_strlen($text,'UTF-8') > $start + 300) $snippet .= '...';
                            $escapedNeedle = preg_quote($q, '/');
                            $snippet_high = preg_replace_callback('/(' . $escapedNeedle . ')/iu', function($m){ return '<mark class="search-hit">' . $m[0] . '</mark>'; }, $snippet);
                            $rel = str_replace('\\','/', substr($fp, strlen(__DIR__) + 1));
                            $fileResults[] = ['path' => $rel, 'snippet' => $snippet_high];
                        }
                    }
                }

                // deduplicar resultados (normalizar com realpath)
                $unique = [];
                foreach ($fileResults as $fr) {
                    $abs = realpath(__DIR__ . DIRECTORY_SEPARATOR . $fr['path']);
                    $key = $abs ? $abs : $fr['path'];
                    if (isset($unique[$key])) continue;
                    $unique[$key] = $fr;
                }
                $fileResults = array_values($unique);

                if (count($fileResults) === 0) {
                    echo '<div class="no-results">Nenhum resultado encontrado no site.</div>';
                } else {
                    // Mapear caminhos de arquivo para títulos bonitos
                    $titleMap = [
                        'Index/index.php' => 'Página Inicial',
                        'Instituição/instituicao.php' => 'Sobre a Instituição',
                        'Atividades/atividades.php' => 'Atividades',
                        'Comunicados/comunicados.php' => 'Comunicados',
                        'Cadastro/cadastro.php' => 'Cadastro',
                        'search.php' => 'Busca',
                    ];

                    foreach ($fileResults as $fr) {
                        $link = htmlspecialchars($fr['path'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
                        // Usar título mapeado ou o nome do arquivo
                        $displayTitle = isset($titleMap[$fr['path']]) ? $titleMap[$fr['path']] : basename($link);
                        
                        echo "<article class='result-card'>";
                        echo "<h3><a href='" . $link . "' style='color:inherit;text-decoration:none;'>" . $displayTitle . "</a></h3>";
                        echo "<p>" . $fr['snippet'] . "</p>";
                        echo "</article>";
                    }
                    echo "<div style='max-width:900px;margin:6px auto;color:#334155;'><strong>" . count($fileResults) . "</strong> resultado(s) encontrados.</div>";
                }
            ?>
        <?php endif; ?>
        </div>
    </main>
</body>
</html>
