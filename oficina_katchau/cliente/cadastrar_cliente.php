<h1 class="mb-4">cadastrar cliente</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="?page=salvar_cliente" method="POST" autocomplete="off">
            <input type="hidden" name="acao" value="cadastrar">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nome Completo</label>
                    <input type="text" name="nome_cliente" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">CPF</label>
                    <input type="text" name="cpf" class="form-control" maxlength="14" oninput="mascaraCPF(this)">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Telefone</label>
                    <input type="text" name="telefone_cliente" class="form-control" maxlength="15" oninput="mascaraTelefone(this)">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">E-mail</label>
                    <input type="email" name="email_cliente" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Endereço</label>
                <input type="text" name="endereco_cliente" class="form-control">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Data de Nascimento</label>
                <input type="date" name="dt_nasc_client" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="?page=listar_cliente" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar Cliente</button>
            </div>
        </form>

    </div>
</div>

<script>
function mascaraCPF(campo) {
    let v = campo.value.replace(/\D/g, "");
    if (v.length > 9)
        campo.value = v.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    else if (v.length > 6)
        campo.value = v.replace(/(\d{3})(\d{3})(\d{3})/, "$1.$2.$3");
    else if (v.length > 3)
        campo.value = v.replace(/(\d{3})(\d{3})/, "$1.$2");
    else
        campo.value = v;
}

function mascaraTelefone(campo) {
    let v = campo.value.replace(/\D/g, "");
    if (v.length > 10) {
        campo.value = v.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
    } else {
        campo.value = v.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
    }
}
</script>
