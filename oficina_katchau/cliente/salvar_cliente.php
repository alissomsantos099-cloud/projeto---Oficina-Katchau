<?php
switch ($_REQUEST['acao'] ?? '') {

    case 'cadastrar':
        $nome     = $_POST['nome_cliente'] ?? '';
        $cpf      = $_POST['cpf'] ?? '';
        $tel      = $_POST['telefone_cliente'] ?? '';
        $email    = $_POST['email_cliente'] ?? '';
        $endereco = $_POST['endereco_cliente'] ?? '';
        $dt_nasc  = $_POST['dt_nasc_client'] ?? null;

        $sql = "INSERT INTO cliente 
                    (nome_cliente, cpf, telefone_cliente, email_cliente, endereco_cliente, dt_nasc_client)
                VALUES 
                    ('{$nome}','{$cpf}','{$tel}','{$email}','{$endereco}'," . 
                    ($dt_nasc ? "'{$dt_nasc}'" : "NULL") . ")";

        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Cliente cadastrado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar cliente: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_cliente';</script>";
    break;

    case 'editar':
        $id       = (int)($_REQUEST['id_cliente'] ?? 0);
        $nome     = $_POST['nome_cliente'] ?? '';
        $cpf      = $_POST['cpf'] ?? '';
        $tel      = $_POST['telefone_cliente'] ?? '';
        $email    = $_POST['email_cliente'] ?? '';
        $endereco = $_POST['endereco_cliente'] ?? '';
        $dt_nasc  = $_POST['dt_nasc_client'] ?? null;

        $sql = "UPDATE cliente SET
                    nome_cliente='{$nome}',
                    cpf='{$cpf}',
                    telefone_cliente='{$tel}',
                    email_cliente='{$email}',
                    endereco_cliente='{$endereco}',
                    dt_nasc_client=" . ($dt_nasc ? "'{$dt_nasc}'" : "NULL") . "
                WHERE id_cliente={$id}";
        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Cliente editado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao editar cliente: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_cliente';</script>";
    break;

    case 'excluir':
        $id = (int)($_REQUEST['id_cliente'] ?? 0);
        $sql = "DELETE FROM cliente WHERE id_cliente={$id}";
        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Cliente excluído com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao excluir cliente: ".addslashes($conn->error)."');</script>";
        }
        echo "<script>location.href='?page=listar_cliente';</script>";
    break;
}
?>
