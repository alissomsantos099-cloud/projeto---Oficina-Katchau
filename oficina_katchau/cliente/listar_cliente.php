<h1>Clientes</h1>
<?php
$sql = "SELECT * FROM cliente ORDER BY nome_cliente";
$res = $conn->query($sql);

if (!$res) {
    echo "<div class='alert alert-danger'>Erro na consulta: ".htmlspecialchars($conn->error)."</div>";
    exit;
}

$qtd = $res->num_rows;

if ($qtd > 0) {
    echo "<p>Encontrou <b>{$qtd}</b> cliente(s).</p>";
    echo "<table class='table table-striped table-hover'>";
    echo "<tr>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Ações</th>
         </tr>";
    while ($row = $res->fetch_object()) {
        echo "<tr>";
        echo "<td>{$row->id_cliente}</td>";
        echo "<td>".htmlspecialchars($row->nome_cliente)."</td>";
        echo "<td>".htmlspecialchars($row->telefone_cliente)."</td>";
        echo "<td>".htmlspecialchars($row->email_cliente)."</td>";
        echo "<td>
                <a class='btn btn-sm btn-success' href='?page=editar_cliente&id_cliente={$row->id_cliente}'>Editar</a>
                <a class='btn btn-sm btn-danger' href='?page=salvar_cliente&acao=excluir&id_cliente={$row->id_cliente}'
                   onclick=\"return confirm('Tem certeza que deseja excluir este cliente?')\">
                   Excluir
                </a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhum cliente encontrado.</p>";
}
?>
