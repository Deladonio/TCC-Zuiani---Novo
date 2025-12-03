<?php
include_once("../util.php");
session_start();

// Apenas usuários conectados podem acessar
if (empty($_SESSION['conectado'])) {
    header('Location: cadastro.php');
    exit;
}

// Processa exclusão (quando solicitado)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $sql_del = "DELETE FROM posts WHERE id = ? LIMIT 1";
    if ($stmt = $conn->prepare($sql_del)) {
        $stmt->bind_param('i', $delete_id);
        $stmt->execute();
        $stmt->close();
    }
    header('Location: adicionar_comu.php');
    exit;
}

// Processa criação/edição
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo']) && isset($_POST['conteudo'])) {
    $titulo = trim($_POST['titulo']);
    $conteudo = trim($_POST['conteudo']);

    if ($titulo === '' || $conteudo === '') {
        $error = 'Preencha título e conteúdo.';
    } else {
        if (!empty($_POST['edit_id'])) {
            $edit_id = intval($_POST['edit_id']);
            $sql_upd = "UPDATE posts SET titulo = ?, conteudo = ? WHERE id = ? LIMIT 1";
            if ($stmt = $conn->prepare($sql_upd)) {
                $stmt->bind_param('ssi', $titulo, $conteudo, $edit_id);
                $stmt->execute();
                $stmt->close();
            }
        } else {
            $sql_ins = "INSERT INTO posts (titulo, conteudo) VALUES (?, ?)";
            if ($stmt = $conn->prepare($sql_ins)) {
                $stmt->bind_param('ss', $titulo, $conteudo);
                $stmt->execute();
                $stmt->close();
            }
        }

        // Redireciona para mostrar a lista atualizada e evitar reenvio
        header('Location: adicionar_comu.php');
        exit;
    }
}

// Se for editar via GET, carregue dados
$edit_id = null;
$edit_post = null;
if (isset($_GET['edit_id'])) {
    $edit_id = intval($_GET['edit_id']);
    $sql_get = "SELECT id, titulo, conteudo FROM posts WHERE id = ? LIMIT 1";
    if ($stmt = $conn->prepare($sql_get)) {
        $stmt->bind_param('i', $edit_id);
        $stmt->execute();
        $stmt->bind_result($rid, $rt, $rc);
        if ($stmt->fetch()) {
            $edit_post = ['id' => $rid, 'titulo' => $rt, 'conteudo' => $rc];
        }
        $stmt->close();
    }
}

// Busca todos os posts para exibir
$posts = [];
$sql = "SELECT id, titulo, conteudo FROM posts ORDER BY id DESC";
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
    $result->free();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração de Comunicados</title>
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="./adicionar_comu.css">
    <link rel="shortcut icon" href="../favicon_io/favicon.ico" type="image/x-icon">
</head>
<body>
    <main>
        <div class="alinhar">

            <div class="admin-container">
                <div class="admin-header">
                    <h1>Administração de Comunicados</h1>
                    <button class="btn-voltar" onclick="window.location.href='comunicados.php'">Voltar aos Comunicados</button>
                </div>

                <div class="form-container">
                    <h2 id="form-title"><?php echo $edit_post ? 'Editar Comunicado' : 'Adicionar Novo Comunicado'; ?></h2>
                    <?php if ($error): ?>
                        <p class="error"><?php echo htmlspecialchars($error); ?></p>
                    <?php endif; ?>
                    <form method="post">
                        <?php if ($edit_post): ?>
                            <input type="hidden" name="edit_id" value="<?php echo (int)$edit_post['id']; ?>">
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" id="titulo" name="titulo" required value="<?php echo $edit_post ? htmlspecialchars($edit_post['titulo']) : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="conteudo">Conteúdo:</label>
                            <textarea id="conteudo" name="conteudo" rows="6" required><?php echo $edit_post ? htmlspecialchars($edit_post['conteudo']) : ''; ?></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-salvar"><?php echo $edit_post ? 'Salvar Alterações' : 'Salvar'; ?></button>
                            <button type="button" class="btn-cancelar" onclick="window.location.href='adicionar_comu.php'">Cancelar</button>
                        </div>
                    </form>
                </div>

                <div class="lista-container">
                    <h2>Comunicados Existentes</h2>
                    <div id="lista-comunicados">
                        <?php if (count($posts) === 0): ?>
                            <p>Não há comunicados cadastrados.</p>
                        <?php else: ?>
                            <?php foreach ($posts as $p): ?>
                                <div class="comunicado-admin-item">
                                    <div class="comunicado-admin-header">
                                        <h3><?php echo htmlspecialchars($p['titulo']); ?></h3>
                                        <div class="comunicado-admin-acoes">
                                            <a class="btn-editar-admin" href="adicionar_comu.php?edit_id=<?php echo (int)$p['id']; ?>">Editar</a>
                                            <form method="post" style="display:inline-block;margin:0;">
                                                <input type="hidden" name="delete_id" value="<?php echo (int)$p['id']; ?>">
                                                <button type="submit" class="btn-remover-admin" onclick="return confirm('Confirmar exclusão deste comunicado?');">Remover</button>
                                            </form>
                                        </div>
                                    </div>
                                    <p><?php echo nl2br(htmlspecialchars($p['conteudo'])); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
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
</body>
</html>
