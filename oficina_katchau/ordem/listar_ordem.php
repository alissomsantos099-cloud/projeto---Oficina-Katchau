<h1>Ordens de Serviço</h1>
<?php
$sql = "SELECT 
            o.id_ordem,
            o.data_abertura,
            o.data_fechamento,
            o.status,
            o.valor_total,
            c.nome_cliente,
            v.placa,
            v.modelo,
            s.nome_servico
        FROM ordem_servico o
        INNER JOIN cliente c ON c.id_cliente = o.id_cliente
        INNER JOIN veiculo v ON v.id_veiculo = o.id_veiculo
        INNER JOIN servico s ON s.id_servico = o.id_servico
        ORDER BY o.data_abertura DESC, o.id_ordem DESC";

$res = $conn->query($sql);
if(!$res){
    echo "<div class='alert alert-danger'>Erro na consulta: ".htmlspecialchars($conn->error)."</div>";
    exit;
}

$qtd = $res->num_rows;
?>

<div class="d-flex justify-content-between mb-3">
    <p class="mb-0">
        <?php
            if ($qtd > 0) echo "Encontrou <b>{$qtd}</b> ordem(ns) de serviço.";
            else echo "Nenhuma OS cadastrada.";
        ?>
    </p>
    <a href="?page=cadastrar_ordem" class="btn btn-primary">+ Nova OS</a>
</div>

<?php if ($qtd > 0): ?>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Data Abertura</th>
            <th>Cliente</th>
            <th>Veículo</th>
            <th>Serviço</th>
            <th>Status</th>
            <th>Valor</th>
            <th class="text-center" style="width: 180px;">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php while($o = $res->fetch_object()):
            $data_ab = $o->data_abertura ? date('d/m/Y', strtotime($o->data_abertura)) : '';
            $veic = $o->placa . " - " . $o->modelo;
            $valor = "R$ " . number_format((float)$o->valor_total, 2, ',', '.');
        ?>
        <tr>
            <td><?=$data_ab?></td>
            <td><?=htmlspecialchars($o->nome_cliente)?></td>
            <td><?=htmlspecialchars($veic)?></td>
            <td><?=htmlspecialchars($o->nome_servico)?></td>
            <td><?=htmlspecialchars($o->status)?></td>
            <td><?=$valor?></td>
            <td class="text-center">
                <a href="?page=editar_ordem&id_ordem=<?=$o->id_ordem?>" class="btn btn-sm btn-success me-2">Editar</a>
                <a href="?page=salvar_ordem&acao=excluir&id_ordem=<?=$o->id_ordem?>"
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Confirma exclusão desta OS?')">
                    Excluir
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php endif; ?>
