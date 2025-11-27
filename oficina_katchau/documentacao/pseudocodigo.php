<?php
// documentacao/pseudocodigo.php

$arquivo = __DIR__ . '/servicos_pseudocodigo.txt';

if (file_exists($arquivo)) {
    $conteudo = file_get_contents($arquivo);
} else {
    $conteudo = "Arquivo 'servicos_pseudocodigo.txt' não encontrado!";
}
?>
<h1>Pseudocódigo — Gerenciamento de Serviços</h1>

<pre style="white-space:pre-wrap; background:#f8f9fa; padding:15px; border:1px solid #ddd; border-radius:5px;">
<?= htmlspecialchars($conteudo); ?>
</pre>

<p>
    <a href="?page=docs_index">← Voltar</a>
</p>
