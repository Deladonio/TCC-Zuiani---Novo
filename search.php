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
</head>
<body>
    <header style="padding:12px; background:#f5f5f5; border-bottom:1px solid #ddd;">
        <a href="Index/index.php">Início</a> | <a href="Comunicados/comunicados.php">Comunicados</a>
    </header>
    <main style="padding:20px;">
        <h1>Resultados da busca</h1>
        <?php if ($q === ''): ?>
            <p>Digite um termo para buscar comunicados.</p>
        <?php else: ?>
            <p>Buscando por: <strong><?php echo htmlspecialchars($q, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></strong></p>
            <?php
                $like = "%" . $q . "%";
                $sql = "SELECT id, titulo, conteudo FROM posts WHERE titulo LIKE ? OR conteudo LIKE ? ORDER BY id DESC";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param('ss', $like, $like);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    if ($res->num_rows === 0) {
                        echo '<p>Nenhum comunicado encontrado.</p>';
                    } else {
                        while ($row = $res->fetch_assoc()) {
                            $titulo = htmlspecialchars($row['titulo'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
                            $conteudo = nl2br(htmlspecialchars($row['conteudo'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));
                            echo "<article style='border:1px solid #ddd;padding:12px;margin:12px 0;border-radius:6px;'>";
                            echo "<h3>{$titulo}</h3>";
                            echo "<p>{$conteudo}</p>";
                            echo "</article>";
                        }
                    }
                    $stmt->close();
                } else {
                    echo '<p>Erro ao realizar busca.</p>';
                }
            ?>
        <?php endif; ?>
        <p><a href="Comunicados/comunicados.php">Voltar aos comunicados</a></p>
    </main>
</body>
</html>
