<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Oficina Katchau</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo_Katchau.png" alt="Logo Katchau" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <!-- CLIENTE -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Clientes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar_cliente">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar_cliente">Listar</a></li>
                        </ul>
                    </li>

                    <!-- VEÍCULO -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Veículos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar_veiculo">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar_veiculo">Listar</a></li>
                        </ul>
                    </li>

                    <!-- SERVIÇOS -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Serviços
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar_servico">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar_servico">Listar</a></li>
                        </ul>
                    </li>

                    <!-- ORDEM DE SERVIÇO -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Ordens
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar_ordem">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar_ordem">Listar</a></li>
                        </ul>
                    </li>

                    <!-- DOCUMENTAÇÃO -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Documentação
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=docs_index">Índice</a></li>
                            <li><a class="dropdown-item" href="?page=docs_pseudocodigo">Pseudocódigo</a></li>
                            <li><a class="dropdown-item" href="?page=docs_fluxograma">Fluxograma (Mermaid)</a></li>
                            <li><a class="dropdown-item" href="?page=docs_algoritmo">Algoritmo (Portugol)</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="?page=docs_download">Baixar ZIP</a></li>
                        </ul>
                    </li>

                </ul>

                <span class="navbar-text text-light">
                    Sistema de Oficina Katchau
                </span>
            </div>
        </div>
    </nav>

    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col">
                <?php
                    include_once("config.php");

                    $page = $_GET['page'] ?? '';

                    switch ($page) {

                        // CLIENTE
                        case 'cadastrar_cliente': include("cliente/cadastrar_cliente.php"); break;
                        case 'listar_cliente': include("cliente/listar_cliente.php"); break;
                        case 'editar_cliente': include("cliente/editar_cliente.php"); break;
                        case 'salvar_cliente': include("cliente/salvar_cliente.php"); break;

                        // VEÍCULO
                        case 'cadastrar_veiculo': include("veiculo/cadastrar_veiculo.php"); break;
                        case 'listar_veiculo': include("veiculo/listar_veiculo.php"); break;
                        case 'editar_veiculo': include("veiculo/editar_veiculo.php"); break;
                        case 'salvar_veiculo': include("veiculo/salvar_veiculo.php"); break;

                        // SERVIÇO
                        case 'cadastrar_servico': include("servico/cadastrar_servico.php"); break;
                        case 'listar_servico': include("servico/listar_servico.php"); break;
                        case 'editar_servico': include("servico/editar_servico.php"); break;
                        case 'salvar_servico': include("servico/salvar_servico.php"); break;

                        // ORDEM DE SERVIÇO
                        case 'cadastrar_ordem': include("ordem/cadastrar_ordem.php"); break;
                        case 'listar_ordem': include("ordem/listar_ordem.php"); break;
                        case 'editar_ordem': include("ordem/editar_ordem.php"); break;
                        case 'salvar_ordem': include("ordem/salvar_ordem.php"); break;

                        // DOCUMENTAÇÃO
                        case 'docs_index': include("documentacao/index.php"); break;
                        case 'docs_pseudocodigo': include("documentacao/pseudocodigo.php"); break;
                        case 'docs_fluxograma': include("documentacao/fluxograma.php"); break;
                        case 'docs_algoritmo': include("documentacao/algoritmo.php"); break;
                        case 'docs_download': include("documentacao/download.php"); break;

                        // HOME (DASHBOARD)
                        default:
                            // --- Contagens por status ---
                            $statusCounts = [
                                'PENDENTE' => 0,
                                'EM ANDAMENTO' => 0,
                                'CONCLUIDA' => 0
                            ];

                            $sqlCounts = "SELECT status, COUNT(*) AS qt FROM ordem_servico GROUP BY status";
                            $resCounts = $conn->query($sqlCounts);
                            if ($resCounts) {
                                while ($r = $resCounts->fetch_object()) {
                                    $st = strtoupper(trim($r->status));
                                    if(array_key_exists($st, $statusCounts)) {
                                        $statusCounts[$st] = (int)$r->qt;
                                    } else {
                                        // se houver outros status, agrupa em 'PENDENTE' por padrão
                                        $statusCounts['PENDENTE'] += (int)$r->qt;
                                    }
                                }
                            }

                            // --- Últimas 5 ordens ---
                            $sqlLatest = "SELECT 
                                            o.id_ordem,
                                            o.data_abertura,
                                            o.status,
                                            o.valor_total,
                                            c.nome_cliente,
                                            v.placa,
                                            s.nome_servico
                                          FROM ordem_servico o
                                          LEFT JOIN cliente c ON c.id_cliente = o.id_cliente
                                          LEFT JOIN veiculo v ON v.id_veiculo = o.id_veiculo
                                          LEFT JOIN servico s ON s.id_servico = o.id_servico
                                          ORDER BY o.data_abertura DESC, o.id_ordem DESC
                                          LIMIT 5";
                            $resLatest = $conn->query($sqlLatest);
                            ?>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <h1 class="mb-3 text-center">Bem-vindo à Oficina Katchau</h1>
                                    <p class="lead text-center"></p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4 mb-3">
                                    <div class="card text-white bg-danger h-100">
                                        <div class="card-body">
                                            <h6 class="card-title">Serviços Pendentes</h6>
                                            <h2 class="card-text"><?= (int)$statusCounts['PENDENTE'] ?></h2>
                                            <p class="small">Ordens que precisam de atenção imediata.</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="?page=listar_ordem&filtro=pendente" class="text-white">Ver pendentes →</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="card text-dark bg-warning h-100">
                                        <div class="card-body">
                                            <h6 class="card-title">Em Andamento</h6>
                                            <h2 class="card-text"><?= (int)$statusCounts['EM ANDAMENTO'] ?></h2>
                                            <p class="small">Serviços atualmente em execução.</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="?page=listar_ordem&filtro=andamento" class="text-dark">Ver em andamento →</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="card text-white bg-success h-100">
                                        <div class="card-body">
                                            <h6 class="card-title">Concluídas</h6>
                                            <h2 class="card-text"><?= (int)$statusCounts['CONCLUIDA'] ?></h2>
                                            <p class="small">Serviços finalizados com sucesso.</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="?page=listar_ordem&filtro=concluida" class="text-white">Ver concluídas →</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="mb-0">Últimas Ordens de Serviço</h5>
                                                <a href="?page=listar_ordem" class="btn btn-outline-primary btn-sm">Ver todas</a>
                                            </div>

                                            <?php if ($resLatest && $resLatest->num_rows > 0): ?>
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-striped">
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th>Data</th>
                                                                <th>Cliente</th>
                                                                <th>Veículo (placa)</th>
                                                                <th>Serviço</th>
                                                                <th>Status</th>
                                                                <th>Valor</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while ($row = $resLatest->fetch_object()):
                                                                $data = $row->data_abertura ? date('d/m/Y', strtotime($row->data_abertura)) : '';
                                                                $cliente = htmlspecialchars($row->nome_cliente ?? '—');
                                                                $veiculo = htmlspecialchars(($row->placa ?? '—'));
                                                                $servico = htmlspecialchars($row->nome_servico ?? '—');
                                                                $status = htmlspecialchars($row->status ?? '—');
                                                                $valor = is_null($row->valor_total) ? 'R$ 0,00' : 'R$ ' . number_format((float)$row->valor_total, 2, ',', '.');
                                                                $sUp = strtoupper(trim($row->status ?? ''));
                                                                if ($sUp === 'PENDENTE') $badgeClass = 'danger';
                                                                elseif ($sUp === 'EM ANDAMENTO') $badgeClass = 'warning text-dark';
                                                                elseif ($sUp === 'CONCLUIDA' || $sUp === 'CONCLUÍDA') $badgeClass = 'success';
                                                                else $badgeClass = 'secondary';
                                                            ?>
                                                            <tr>
                                                                <td><?= $data ?></td>
                                                                <td><?= $cliente ?></td>
                                                                <td><?= $veiculo ?></td>
                                                                <td><?= $servico ?></td>
                                                                <td><span class="badge bg-<?= $badgeClass ?>"><?= $status ?></span></td>
                                                                <td><?= $valor ?></td>
                                                            </tr>
                                                            <?php endwhile; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php else: ?>
                                                <p class="mb-0">Nenhuma ordem encontrada.</p>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            break;
                    }
                ?>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light mt-5 pt-4 pb-3">
        <div class="container text-center">
            © <?php echo date('Y'); ?> Oficina Katchau — Todos os direitos reservados.
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
