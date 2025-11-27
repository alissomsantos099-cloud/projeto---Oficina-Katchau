<h1 class="mb-4">Cadastrar Serviço</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="?page=salvar_servico" method="POST" autocomplete="off">
            <input type="hidden" name="acao" value="cadastrar">

            <div class="mb-3">
                <label class="form-label fw-bold">Nome do Serviço</label>
                <input type="text" name="nome_servico" class="form-control" placeholder="Ex: Troca de óleo" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Descrição</label>
                <textarea name="descricao_servico" class="form-control" rows="3" placeholder="Detalhes do serviço..."></textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Valor Base (R$)</label>
                <input type="number" step="0.01" name="valor_base" class="form-control" placeholder="0,00">
            </div>

            <div class="d-flex justify-content-between">
                <a href="?page=listar_servico" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar Serviço</button>
            </div>
        </form>

    </div>
</div>
