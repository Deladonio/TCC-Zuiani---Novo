<?php
session_start();
session_unset(); // Remove todas as variáveis de sessão
session_destroy(); // Destroi a sessão

// Redireciona para a página inicial ou de login
header("Location: ../Index/index.php");
exit();
?>