<?php
$id = (int)($_GET['id_servico'] ?? 0);
if ($id <= 0) {
    echo "<div class='alert alert-warning'>ID de serviço inválido.</div>";
    exit;
}

$sql = "SELECT * FROM servico WHERE id_servico={$id}";
$res = $conn->query($sql);
$serv = $res->fetch_object();
if (!$serv) {
    echo "<div class='alert alert-warning'>Serviço não encontrado.</div>";
    exit;
}
?>

<h1 class="mb-4">Editar Serviço</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="?page=salvar_servico" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id_servico" value="<?=$serv->id_servico?>">

            <div class="mb-3">
                <label class="form-label fw-bold">Nome do Serviço</label>
                <input type="text" name="nome_servico" class="form-control" value="<?=htmlspecialchars($serv->nome_servico)?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Descrição</label>
                <textarea name="descricao_servico" class="form-control" rows="3"><?=htmlspecialchars($serv->descricao_servico)?></textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Valor Base (R$)</label>
                <input type="number" step="0.01" name="valor_base" class="form-control" value="<?=htmlspecialchars($serv->valor_base)?>">
            </div>

            <div class="d-flex justify-content-between">
                <a href="?page=listar_servico" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar Alterações</button>
            </div>
        </form>

    </div>
</div>
