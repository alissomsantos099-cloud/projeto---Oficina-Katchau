<?php
$acao = $_REQUEST['acao'] ?? '';

switch ($acao) {

    case 'cadastrar':
        $id_cliente = (int)($_POST['id_cliente'] ?? 0);
        $id_veiculo = (int)($_POST['id_veiculo'] ?? 0);
        $id_servico = (int)($_POST['id_servico'] ?? 0);
        $data_abertura   = $_POST['data_abertura'] ?? '';
        $data_fechamento = $_POST['data_fechamento'] ?? null;
        $status = $_POST['status'] ?? 'ABERTA';
        $valor_total = str_replace(',', '.', $_POST['valor_total'] ?? '0');
        $obs = $_POST['observacoes'] ?? '';

        $sql = "INSERT INTO ordem_servico 
                    (id_cliente, id_veiculo, id_servico, data_abertura, data_fechamento, status, valor_total, observacoes)
                VALUES 
                    ({$id_cliente}, {$id_veiculo}, {$id_servico},
                     '{$data_abertura}', ".($data_fechamento ? "'{$data_fechamento}'" : "NULL").",
                     '{$status}', {$valor_total}, '{$obs}')";

        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Ordem de serviço cadastrada com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar OS: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_ordem';</script>";
    break;

    case 'editar':
        $id_ordem = (int)($_REQUEST['id_ordem'] ?? 0);
        $id_cliente = (int)($_POST['id_cliente'] ?? 0);
        $id_veiculo = (int)($_POST['id_veiculo'] ?? 0);
        $id_servico = (int)($_POST['id_servico'] ?? 0);
        $data_abertura   = $_POST['data_abertura'] ?? '';
        $data_fechamento = $_POST['data_fechamento'] ?? null;
        $status = $_POST['status'] ?? 'ABERTA';
        $valor_total = str_replace(',', '.', $_POST['valor_total'] ?? '0');
        $obs = $_POST['observacoes'] ?? '';

        $sql = "UPDATE ordem_servico SET
                    id_cliente={$id_cliente},
                    id_veiculo={$id_veiculo},
                    id_servico={$id_servico},
                    data_abertura='{$data_abertura}',
                    data_fechamento=".($data_fechamento ? "'{$data_fechamento}'" : "NULL").",
                    status='{$status}',
                    valor_total={$valor_total},
                    observacoes='{$obs}'
                WHERE id_ordem={$id_ordem}";
        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Ordem de serviço atualizada com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao atualizar OS: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_ordem';</script>";
    break;

    case 'excluir':
        $id_ordem = (int)($_REQUEST['id_ordem'] ?? 0);
        $sql = "DELETE FROM ordem_servico WHERE id_ordem={$id_ordem}";
        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Ordem excluída com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao excluir OS: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_ordem';</script>";
    break;
}
?>
