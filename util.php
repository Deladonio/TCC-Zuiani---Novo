<?php
$host = "localhost";    // Servidor
$usuario = "root";      // Usuário do MySQL
$senha = "";            // Senha do MySQL
$banco = "banco_tcc";   // Nome do banco criado

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica conexão
if ($conn->connect_error) {
    // Em produção, evite expor detalhes da conexão
    die("Falha na conexão com o banco de dados.");
}

// Configura charset para evitar problemas com acentuação
if (! $conn->set_charset("utf8mb4")) {
    // não fatal: apenas assegura o charset
}
?>
