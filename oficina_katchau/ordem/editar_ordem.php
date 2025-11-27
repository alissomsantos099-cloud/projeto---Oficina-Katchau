<?php
$id_ordem = (int)($_GET['id_ordem'] ?? 0);
if ($id_ordem <= 0) {
    echo "<div class='alert alert-warning'>ID de OS inválido.</div>";
    exit;
}

$sql = "SELECT * FROM ordem_servico WHERE id_ordem={$id_ordem}";
$res = $conn->query($sql);
$os = $res->fetch_object();
if (!$os) {
    echo "<div class='alert alert-warning'>OS não encontrada.</div>";
    exit;
}

$sqlCli = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY nome_cliente";
$resCli = $conn->query($sqlCli);

$sqlVei = "SELECT v.id_veiculo, v.placa, v.modelo, c.nome_cliente
           FROM veiculo v
           INNER JOIN cliente c ON c.id_cliente = v.id_cliente
           ORDER BY c.nome_cliente, v.placa";
$resVei = $conn->query($sqlVei);

$sqlServ = "SELECT id_servico, nome_servico FROM servico ORDER BY nome_servico";
$resServ = $conn->query($sqlServ);
?>

<h1 class="mb-4">Editar Ordem de Serviço</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="?page=salvar_ordem" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id_ordem" value="<?=$os->id_ordem?>">

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Cliente</label>
                    <select name="id_cliente" class="form-control" required>
                        <option value="">Selecione o cliente</option>
                        <?php while($c = $resCli->fetch_object()):
                            $sel = ($c->id_cliente == $os->id_cliente) ? 'selected' : '';
                        ?>
                            <option value="<?=$c->id_cliente?>" <?=$sel?>><?=htmlspecialchars($c->nome_cliente)?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Veículo</label>
                    <select name="id_veiculo" class="form-control" required>
                        <option value="">Selecione o veículo</option>
                        <?php while($v = $resVei->fetch_object()):
                            $rotulo = $v->nome_cliente . " - " . $v->placa . " - " . $v->modelo;
                            $sel = ($v->id_veiculo == $os->id_veiculo) ? 'selected' : '';
                        ?>
                            <option value="<?=$v->id_veiculo?>" <?=$sel?>><?=htmlspecialchars($rotulo)?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Serviço</label>
                    <select name="id_servico" class="form-control" required>
                        <option value="">Selecione o serviço</option>
                        <?php while($s = $resServ->fetch_object()):
                            $sel = ($s->id_servico == $os->id_servico) ? 'selected' : '';
                        ?>
                            <option value="<?=$s->id_servico?>" <?=$sel?>><?=htmlspecialchars($s->nome_servico)?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Data de Abertura</label>
                    <input type="date" name="data_abertura" class="form-control" value="<?=$os->data_abertura?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Data de Fechamento</label>
                    <input type="date" name="data_fechamento" class="form-control" value="<?=$os->data_fechamento?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Status</label>
                    <select name="status" class="form-control" required>
                        <?php
                        $statusList = ['ABERTA','EM ANDAMENTO','CONCLUIDA'];
                        foreach($statusList as $st):
                            $sel = ($st == $os->status) ? 'selected' : '';
                        ?>
                            <option value="<?=$st?>" <?=$sel?>><?=$st?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Valor Total (R$)</label>
                <input type="number" step="0.01" name="valor_total" class="form-control" value="<?=htmlspecialchars($os->valor_total)?>">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Observações</label>
                <textarea name="observacoes" class="form-control" rows="3"><?=htmlspecialchars($os->observacoes)?></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="?page=listar_ordem" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar Alterações</button>
            </div>
        </form>

    </div>
</div>
