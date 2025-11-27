<?php
// documentacao/download.php

$zip = __DIR__ . '/documentacao_servicos.zip';

if (!file_exists($zip)) {
    echo "<h1>Arquivo não encontrado!</h1>";
    echo "<p>O arquivo <b>documentacao_servicos.zip</b> não está na pasta <b>documentacao/</b>.</p>";
    echo "<p>Coloque o ZIP lá para habilitar o download.</p>";
    echo '<p><a href="?page=docs_index">← Voltar</a></p>';
    exit;
}

header("Content-Type: application/zip");
header("Content-Disposition: attachment; filename=documentacao_servicos.zip");
header("Content-Length: " . filesize($zip));

readfile($zip);
exit;
