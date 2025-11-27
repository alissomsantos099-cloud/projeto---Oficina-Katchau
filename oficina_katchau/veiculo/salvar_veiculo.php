<?php
$acao = $_REQUEST['acao'] ?? '';

switch ($acao) {

    case 'cadastrar':
        $id_cliente = (int)($_POST['id_cliente'] ?? 0);
        $placa  = $_POST['placa'] ?? '';
        $marca  = $_POST['marca'] ?? '';
        $modelo = $_POST['modelo'] ?? '';
        $ano    = $_POST['ano'] ?? null;
        $cor    = $_POST['cor'] ?? '';

        $sql = "INSERT INTO veiculo (id_cliente, placa, marca, modelo, ano, cor)
                VALUES ({$id_cliente}, '{$placa}', '{$marca}', '{$modelo}', ".($ano ? (int)$ano : "NULL").", '{$cor}')";
        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Veículo cadastrado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar veículo: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_veiculo';</script>";
    break;

    case 'editar':
        $id_veiculo = (int)($_REQUEST['id_veiculo'] ?? 0);
        $id_cliente = (int)($_POST['id_cliente'] ?? 0);
        $placa  = $_POST['placa'] ?? '';
        $marca  = $_POST['marca'] ?? '';
        $modelo = $_POST['modelo'] ?? '';
        $ano    = $_POST['ano'] ?? null;
        $cor    = $_POST['cor'] ?? '';

        $sql = "UPDATE veiculo SET
                    id_cliente={$id_cliente},
                    placa='{$placa}',
                    marca='{$marca}',
                    modelo='{$modelo}',
                    ano=".($ano ? (int)$ano : "NULL").",
                    cor='{$cor}'
                WHERE id_veiculo={$id_veiculo}";
        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Veículo atualizado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao atualizar veículo: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_veiculo';</script>";
    break;

    case 'excluir':
        $id_veiculo = (int)($_REQUEST['id_veiculo'] ?? 0);
        $sql = "DELETE FROM veiculo WHERE id_veiculo={$id_veiculo}";
        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Veículo excluído com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao excluir veículo: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_veiculo';</script>";
    break;
}
?>
