<?php
    // ================================
    // CONFIGURAÇÃO DE CONEXÃO COM O BD
    // ================================

    // Credenciais do banco
    define("HOST", "localhost:3306");
    define("USER", "root");
    define("PASS", "");
    define("BASE", "oficina_katchau");

    // Criar conexão
    $conn = new MySQLi(HOST, USER, PASS, BASE);

    // Verificar erro
    if ($conn->connect_error) {
        die("<b>Erro na conexão com o banco:</b> " . $conn->connect_error);
    }

    // Charset para acentos e caracteres especiais
    $conn->set_charset("utf8mb4");
?>
