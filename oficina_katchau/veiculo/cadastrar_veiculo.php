<h1 class="mb-4">Cadastrar Veículo</h1>

<?php
$sqlCli = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY nome_cliente";
$resCli = $conn->query($sqlCli);
?>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="?page=salvar_veiculo" method="POST" autocomplete="off">
            <input type="hidden" name="acao" value="cadastrar">

            <div class="mb-3">
                <label class="form-label fw-bold">Cliente</label>
                <select name="id_cliente" class="form-control" required>
                    <option value="">Selecione o cliente</option>
                    <?php while($c = $resCli->fetch_object()): ?>
                        <option value="<?=$c->id_cliente?>"><?=htmlspecialchars($c->nome_cliente)?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Placa</label>
                    <input type="text" name="placa" class="form-control" placeholder="ABC1234" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Marca</label>
                    <input type="text" name="marca" class="form-control" placeholder="Ex: Fiat" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Modelo</label>
                    <input type="text" name="modelo" class="form-control" placeholder="Ex: Uno">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="form-label fw-bold">Ano</label>
                    <input type="number" name="ano" class="form-control" placeholder="2020">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Cor</label>
                    <input type="text" name="cor" class="form-control" placeholder="Prata">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="?page=listar_veiculo" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar Veículo</button>
            </div>
        </form>

    </div>
</div>
