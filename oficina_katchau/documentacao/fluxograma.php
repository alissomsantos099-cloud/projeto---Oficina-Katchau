<?php
// documentacao/fluxograma.php

$arquivo = __DIR__ . '/servicos_fluxograma.md';

if (file_exists($arquivo)) {
    $conteudo = file_get_contents($arquivo);
} else {
    $conteudo = "Arquivo 'servicos_fluxograma.md' não encontrado!";
}
?>
<h1>Fluxograma (Mermaid)</h1>

<p>O conteúdo abaixo está em formato Mermaid. Para visualizá-lo renderizado, use VSCode ou GitHub.</p>

<pre style="white-space:pre-wrap; background:#f8f9fa; padding:15px; border:1px solid #ddd; border-radius:5px;">
<?= htmlspecialchars($conteudo); ?>
</pre>

<p>
    <a href="?page=docs_index">← Voltar</a>
</p>
