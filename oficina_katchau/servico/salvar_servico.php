<?php
$acao = $_REQUEST['acao'] ?? '';

switch ($acao) {

    case 'cadastrar':
        $nome = $_POST['nome_servico'] ?? '';
        $desc = $_POST['descricao_servico'] ?? '';
        $valor = str_replace(',', '.', $_POST['valor_base'] ?? '0');

        $sql = "INSERT INTO servico (nome_servico, descricao_servico, valor_base)
                VALUES ('{$nome}', '{$desc}', {$valor})";
        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Serviço cadastrado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar serviço: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_servico';</script>";
    break;

    case 'editar':
        $id = (int)($_REQUEST['id_servico'] ?? 0);
        $nome = $_POST['nome_servico'] ?? '';
        $desc = $_POST['descricao_servico'] ?? '';
        $valor = str_replace(',', '.', $_POST['valor_base'] ?? '0');

        $sql = "UPDATE servico SET
                    nome_servico='{$nome}',
                    descricao_servico='{$desc}',
                    valor_base={$valor}
                WHERE id_servico={$id}";
        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Serviço atualizado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao atualizar serviço: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_servico';</script>";
    break;

    case 'excluir':
        $id = (int)($_REQUEST['id_servico'] ?? 0);
        $sql = "DELETE FROM servico WHERE id_servico={$id}";
        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Serviço excluído com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao excluir serviço: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_servico';</script>";
    break;
}
?>
