<?php
    session_destroy(); //destroi a sessão
    setcookie("PHPSESSID", "", time() - 3600); //apaga o cookie da sessão
    session_start();
    session_regenerate_id();
    unset($_SESSION['conectado']);
    unset($_SESSION['login']);
    header("Location: cadastro.php"); //redireciona para cadastro.php
?>