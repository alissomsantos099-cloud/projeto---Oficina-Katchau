<?php
$id_veiculo = (int)($_GET['id_veiculo'] ?? 0);
if ($id_veiculo <= 0) {
    echo "<div class='alert alert-warning'>ID de veículo inválido.</div>";
    exit;
}

$sql = "SELECT * FROM veiculo WHERE id_veiculo={$id_veiculo}";
$res = $conn->query($sql);
$vei = $res->fetch_object();
if (!$vei) {
    echo "<div class='alert alert-warning'>Veículo não encontrado.</div>";
    exit;
}

$sqlCli = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY nome_cliente";
$resCli = $conn->query($sqlCli);
?>

<h1 class="mb-4">Editar Veículo</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="?page=salvar_veiculo" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id_veiculo" value="<?=$vei->id_veiculo?>">

            <div class="mb-3">
                <label class="form-label fw-bold">Cliente</label>
                <select name="id_cliente" class="form-control" required>
                    <option value="">Selecione o cliente</option>
                    <?php while($c = $resCli->fetch_object()): 
                        $sel = ($c->id_cliente == $vei->id_cliente) ? 'selected' : '';
                    ?>
                        <option value="<?=$c->id_cliente?>" <?=$sel?>><?=htmlspecialchars($c->nome_cliente)?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Placa</label>
                    <input type="text" name="placa" class="form-control" value="<?=htmlspecialchars($vei->placa)?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Marca</label>
                    <input type="text" name="marca" class="form-control" value="<?=htmlspecialchars($vei->marca)?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Modelo</label>
                    <input type="text" name="modelo" class="form-control" value="<?=htmlspecialchars($vei->modelo)?>">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="form-label fw-bold">Ano</label>
                    <input type="number" name="ano" class="form-control" value="<?=htmlspecialchars($vei->ano)?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Cor</label>
                    <input type="text" name="cor" class="form-control" value="<?=htmlspecialchars($vei->cor)?>">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="?page=listar_veiculo" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar Alterações</button>
            </div>
        </form>

    </div>
</div>
