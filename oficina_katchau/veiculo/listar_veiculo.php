<h1>Veículos</h1>
<?php
$sql = "SELECT 
            v.id_veiculo,
            v.placa,
            v.marca,
            v.modelo,
            v.ano,
            v.cor,
            c.nome_cliente
        FROM veiculo v
        INNER JOIN cliente c ON c.id_cliente = v.id_cliente
        ORDER BY c.nome_cliente, v.modelo";

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
            if ($qtd > 0) echo "Encontrou <b>{$qtd}</b> veículo(s).";
            else echo "Nenhum veículo cadastrado.";
        ?>
    </p>
    <a href="?page=cadastrar_veiculo" class="btn btn-primary">+ Novo veículo</a>
</div>

<?php if ($qtd > 0): ?>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Cliente</th>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Cor</th>
            <th class="text-center" style="width: 160px;">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $res->fetch_object()): ?>
        <tr>
            <td><?=htmlspecialchars($row->nome_cliente)?></td>
            <td><?=htmlspecialchars($row->placa)?></td>
            <td><?=htmlspecialchars($row->marca)?></td>
            <td><?=htmlspecialchars($row->modelo)?></td>
            <td><?=htmlspecialchars($row->ano)?></td>
            <td><?=htmlspecialchars($row->cor)?></td>
            <td class="text-center">
                <a href="?page=editar_veiculo&id_veiculo=<?=$row->id_veiculo?>" class="btn btn-sm btn-success me-2">Editar</a>
                <a href="?page=salvar_veiculo&acao=excluir&id_veiculo=<?=$row->id_veiculo?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Confirma exclusão deste veículo?')">
                   Excluir
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php endif; ?>
