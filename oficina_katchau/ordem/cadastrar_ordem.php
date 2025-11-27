<h1 class="mb-4">Cadastrar Ordem de Serviço</h1>

<?php
$sqlCli = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY nome_cliente";
$resCli = $conn->query($sqlCli);

$sqlVei = "SELECT v.id_veiculo, v.placa, v.modelo, c.nome_cliente
           FROM veiculo v
           INNER JOIN cliente c ON c.id_cliente = v.id_cliente
           ORDER BY c.nome_cliente, v.placa";
$resVei = $conn->query($sqlVei);

$sqlServ = "SELECT id_servico, nome_servico, valor_base FROM servico ORDER BY nome_servico";
$resServ = $conn->query($sqlServ);
?>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="?page=salvar_ordem" method="POST">
            <input type="hidden" name="acao" value="cadastrar">

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Cliente</label>
                    <select name="id_cliente" class="form-control" required>
                        <option value="">Selecione o cliente</option>
                        <?php while($c = $resCli->fetch_object()): ?>
                            <option value="<?=$c->id_cliente?>"><?=htmlspecialchars($c->nome_cliente)?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Veículo</label>
                    <select name="id_veiculo" class="form-control" required>
                        <option value="">Selecione o veículo</option>
                        <?php while($v = $resVei->fetch_object()):
                            $rotulo = $v->nome_cliente . " - " . $v->placa . " - " . $v->modelo;
                        ?>
                            <option value="<?=$v->id_veiculo?>"><?=htmlspecialchars($rotulo)?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Serviço</label>
                    <select name="id_servico" class="form-control" required>
                        <option value="">Selecione o serviço</option>
                        <?php while($s = $resServ->fetch_object()): 
                            $rotulo = $s->nome_servico . " (R$ " . number_format((float)$s->valor_base,2,',','.') . ")";
                        ?>
                            <option value="<?=$s->id_servico?>"><?=htmlspecialchars($rotulo)?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Data de Abertura</label>
                    <input type="date" name="data_abertura" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Data de Fechamento</label>
                    <input type="date" name="data_fechamento" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="ABERTA">ABERTA</option>
                        <option value="EM ANDAMENTO">EM ANDAMENTO</option>
                        <option value="CONCLUIDA">CONCLUÍDA</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Valor Total (R$)</label>
                <input type="number" step="0.01" name="valor_total" class="form-control" placeholder="0,00">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Observações</label>
                <textarea name="observacoes" class="form-control" rows="3"></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="?page=listar_ordem" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar OS</button>
            </div>
        </form>

    </div>
</div>
