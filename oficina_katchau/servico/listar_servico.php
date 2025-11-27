<h1>Serviços</h1>
<?php
$sql = "SELECT * FROM servico ORDER BY nome_servico";
$res = $conn->query($sql);

if (!$res) {
    echo "<div class='alert alert-danger'>Erro na consulta: ".htmlspecialchars($conn->error)."</div>";
    exit;
}

$qtd = $res->num_rows;
?>

<div class="d-flex justify-content-between mb-3">
    <p class="mb-0">
        <?php
            if ($qtd > 0) echo "Encontrou <b>{$qtd}</b> serviço(s).";
            else echo "Nenhum serviço cadastrado.";
        ?>
    </p>
    <a href="?page=cadastrar_servico" class="btn btn-primary">+ Novo serviço</a>
</div>

<?php if ($qtd > 0): ?>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Valor Base</th>
            <th style="width: 180px;" class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php while($s = $res->fetch_object()): ?>
        <tr>
            <td><?=htmlspecialchars($s->nome_servico)?></td>
            <td>R$ <?=number_format((float)$s->valor_base, 2, ',', '.')?></td>
            <td class="text-center">
                <a href="?page=editar_servico&id_servico=<?=$s->id_servico?>" class="btn btn-sm btn-success me-2">Editar</a>
                <a href="?page=salvar_servico&acao=excluir&id_servico=<?=$s->id_servico?>"
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Confirma exclusão deste serviço?')">
                    Excluir
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php endif; ?>
