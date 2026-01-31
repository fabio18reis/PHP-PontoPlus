<?php
session_start();
require "../Controller/quantoFizController.php";
require "../Controller/listarHorasController.php";
require "../Controller/listarUsuarioController.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PontoApp</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ícones do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card-custom {
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .time-display {
            font-size: 2.2rem;
            font-weight: bold;
        }

        .badge-extra {
            background-color: #ffe0b2;
            color: #d35400;
            font-size: 0.85rem;
        }

        .badge-zero {
            background-color: #e9ecef;
            color: #6c757d;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <!-- Old Nav <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-clock-history text-primary"></i> PontoApp
            </a>
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary btn-sm me-2">Gerencial</button>
                <button class="btn btn-outline-secondary btn-sm me-3">Colaborador</button>
                <div class="d-flex align-items-center">
                    <i class="bi bi-person-circle fs-5 me-1"></i>
                    <span>João Silva</span>
                </div>
            </div>
        </div>
    </nav> -->
    <?php include "navbar.php" ?>

    <!-- Menu Tabs -->
    <div class="container-fluid mt-3 px-4">
        <ul class="nav nav-tabs" id="pontoTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab">
                    <i class="bi bi-grid"></i> Dashboard
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="relatorios-tab" data-bs-toggle="tab" data-bs-target="#plantao" type="button" role="tab">
                    <i class="bi bi-box-arrow-in-down"></i> Plantão
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="registros-tab" data-bs-toggle="tab" data-bs-target="#registros" type="button" role="tab">
                    <i class="bi bi-journal-text"></i> Registros
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="colaboradores-tab" data-bs-toggle="tab" data-bs-target="#colaboradores" type="button" role="tab">
                    <i class="bi bi-people"></i> Colaboradores
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="horas-tab" data-bs-toggle="tab" data-bs-target="#horas" type="button" role="tab">
                    <i class="bi bi-clock"></i> Horas Extras
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="relatorios-tab" data-bs-toggle="tab" data-bs-target="#relatorios" type="button" role="tab">
                    <i class="bi bi-bar-chart"></i> Relatórios
                </button>
            </li>

        </ul>
    </div>

    <!-- Conteúdo das Tabs -->
    <div class="container-fluid px-4 mt-4">
        <div class="tab-content" id="pontoTabsContent">

            <!-- Dashboard -->
            <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="card card-custom p-3 text-center">
                            <div class="text-success"><i class="bi bi-alarm"></i></div>
                            <h6 class="mt-2">Entrada Hoje</h6>
                            <h4 class="fw-bold">08:15</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-custom p-3 text-center">
                            <div class="text-primary"><i class="bi bi-stopwatch"></i></div>
                            <h6 class="mt-2">Horas Trabalhadas</h6>
                            <h4 class="fw-bold">7h 45m</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-custom p-3 text-center">
                            <div class="text-warning"><i class="bi bi-plus-circle"></i></div>
                            <h6 class="mt-2">Horas Extras</h6>
                            <h4 class="fw-bold">2h 15m</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-custom p-3 text-center">
                            <div class="text-danger"><i class="bi bi-calendar-x"></i></div>
                            <h6 class="mt-2">Faltas/Mês</h6>
                            <h4 class="fw-bold">0</h4>
                        </div>
                    </div>
                </div>







                <!-- Registro de Ponto -->
                <div class="card card-custom p-4 text-center mt-4">
                    <h6 class="text-muted">Registro de Ponto</h6>
                    <p class="mb-1">10/09/2025</p>
                    <div class="time-display text-dark">06:59:34</div>
                    <div class="mt-3 d-flex justify-content-center gap-3">
                        <button class="btn btn-success px-4"><i class="bi bi-box-arrow-in-right"></i> Entrada</button>
                        <!--    <button class="btn btn-primary px-4"><i class="bi bi-pause-circle"></i> Pausa</button> -->
                        <button class="btn btn-danger px-4"><i class="bi bi-box-arrow-right"></i> Saída</button>
                    </div>
                </div>
            </div>




            <!-- Rgistro de Plantão -->

            <div class="tab-pane fade show " id="plantao" role="tabpanel">
                <div class="container-fluid px-4 mt-4">

                    <!-- Resumo de Horas Extras -->
                    <div class="card card-custom p-4 mb-4">
                        <h6 class="fw-bold mb-3">Resumo de Horas Extras</h6>
                        <div class="row g-3 text-center">
                            <div class="col-md-2">
                                <div class="p-3 border rounded bg-light">
                                    <?php foreach ($dados['contagemHoras'] as $solicitacoes):?>
                                    <div class="text-primary fw-bold fs-5"><?= htmlspecialchars($solicitacoes['Total_Solicitacoes']);?>                                                                     
                                <?php endforeach;?></div>
                                    <small>Total Solicitações</small>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="p-3 border rounded bg-light">
                                    <?php foreach ($dados['aprovadas'] as $aprovada):?>
                                    <div class="text-success fw-bold fs-5"><?= htmlspecialchars($aprovada['Total_Solicitacoes']);?></div>
                                    <?php endforeach;?>
                                    <small>Aprovadas</small>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="p-3 border rounded bg-light">
                                    <?php foreach ($dados['pendentes'] as $pendente):?>
                                    <div class="text-warning fw-bold fs-5"><?= htmlspecialchars($pendente['Total_Solicitacoes']);?></div>
                                    <?php endforeach;?>
                                    <small>Pendentes</small>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="p-3 border rounded bg-light">
                                    <?php foreach ($dados['rejeitadas'] as $rejeitada): ?>
                                    <div class="text-danger fw-bold fs-5"><?= htmlspecialchars($rejeitada['Total_Solicitacoes']);?></div>
                                    <?php endforeach; ?>
                                    <small>Negadas</small>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="p-3 border rounded bg-light">
                                    <div class="text-purple fw-bold fs-5">45h 30m</div>
                                    <small>Total Horas</small>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="p-3 border rounded bg-light">
                                    <div class="text-orange fw-bold fs-5">R$ 2.850,00</div>
                                    <small>Custo Total</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Solicitações -->
                    <div class="card card-custom p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold">Solicitações de Horas Extras</h6>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaSolicitacaoModal">
                                <i class="bi bi-plus"></i> Nova Solicitação
                            </button>
                        </div>

                        <!-- Filtros -->
                        <ul class="nav nav-pills mb-3">
                            <li class="nav-item"><a class="nav-link active" href="#" data-bs-toggle="tab" data-bs-target="#colaboradores">Todas (4)</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Pendentes (1)</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Aprovadas (2)</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Negadas (1)</a></li>
                        </ul>

                        <!-- Exemplo de Solicitação -->

                        <?php

                        foreach ($dados['horasUser'] as $horaUser): ?>                            
                            <div class="border rounded p-3 mb-3" id="todas">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>

                                        <strong>Fabio Henrique</strong> · Desenvolvimento
                                        <span class=" text-white ms-2 badge <?php echo $horaUser['Front']; ?> "><?= htmlspecialchars($horaUser['Status']) ?></span>
                                        <div class="small text-muted">Data: <?= htmlspecialchars($horaUser['data']) ?> | Horário: <?= htmlspecialchars($horaUser['hora_inicio']) ?> - <?= htmlspecialchars($horaUser['hora_fim']) ?> | Duração: <span class="text-orange"><?= htmlspecialchars($horaUser['Horas_trabalhadas']) ?></span></div>
                                        <div class="small text-muted">Motivo: Plantão</div>
                                        <div class="small text-muted">Solicitado em: <?= htmlspecialchars($horaUser['criado_em']) ?></div>
                                    </div>
                                    <div>
                                        <button class="btn btn-success btn-sm me-2"><i class="bi bi-check-lg"></i> Aprovar</button>
                                        <button class="btn btn-danger btn-sm me-2"><i class="bi bi-x-lg"></i> Negar</button>
                                        <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-eye"></i> Detalhes</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- Fim Exemplo de Solicitação -->
                    </div>
                </div>
            </div>

            <!-- Modal Nova Solicitação -->
            <div class="modal fade" id="novaSolicitacaoModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="../Controller/insertHoraController.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Nova Solicitação de Hora Extra</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="data" class="form-label">Data</label>
                                        <input type="date" class="form-control" id="data" name="data" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Início</label>
                                        <input type="time" id="inicio" name="inicio" class="form-control" required>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label">Pausa</label>
                                        <input type="time" id="almoco" name="almoco" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Retorno</label>
                                        <input type="time" id="volta_almoco" name="volta_almoco" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Saída</label>
                                        <input type="time" id="fim" name="fim" class="form-control" required>
                                    </div>
                                    <!--<div class="col-12">
                                        <label class="form-label">Motivo</label>
                                        <textarea name="motivo" rows="3" class="form-control" required></textarea>
                                    </div>
    -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Enviar Solicitação</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <!-- Registros -->
            <div class="tab-pane fade" id="registros" role="tabpanel">
                <div class="card card-custom p-4">
                    <h6 class="mb-3 fw-bold">Histórico de Registros</h6>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Entrada</th>
                                    <th class="text-center">Pausa</th>
                                    <th class="text-center">Volta</th>
                                    <th class="text-center">Saída</th>
                                    <th class="text-center">Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($dados['horasUser'] as $horaUser): ?>
                                    <tr>
                                        <td class="text-center"><?= htmlspecialchars($horaUser['data']) ?></td>
                                        <td class="text-center"><?= htmlspecialchars($horaUser['hora_inicio']) ?></td>
                                        <td class="text-center"><?= htmlspecialchars($horaUser['almoco_saida']) ?></td>
                                        <td class="text-center"><?= htmlspecialchars($horaUser['almoco_volta']) ?></td>
                                        <td class="text-center"><?= htmlspecialchars($horaUser['hora_fim']) ?></td>
                                        <td class="text-center"><?= htmlspecialchars($horaUser['Horas_trabalhadas']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Colaboradores -->
            <div class="tab-pane fade" id="colaboradores" role="tabpanel">
                <<div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Equipe</th>
                                    <th class="text-center">Posição</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($usuarios as $usuario): ?>
                                    <tr>
                                        <td class="text-center"><?= htmlspecialchars($usuario['user_name']) ?></td>
                                        <td class="text-center"><?= htmlspecialchars($usuario['user_email']) ?></td>
                                        <td class="text-center"><?= htmlspecialchars($usuario['user_equipe']) ?></td>
                                        <td class="text-center"><?= htmlspecialchars($usuario['user_cargo']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            </div>

            <!-- Horas Extras -->
            <div class="tab-pane fade" id="horas" role="tabpanel">
                <div class="card card-custom p-4 text-center">
                    <h6>Em breve: Gestão de Horas Extras</h6>
                </div>
            </div>

            <!-- Relatórios -->
            <div class="tab-pane fade" id="relatorios" role="tabpanel">
                <div class="card card-custom p-4">
                    <h6 class="mb-3 fw-bold">Total Grana</h6>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">R$</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($ganhos as $ganho): ?>
                                    <tr>
                                        <td class="text-center"><?= htmlspecialchars($ganho['data']) ?></td>
                                        <td class="text-center">R$<?= htmlspecialchars($ganho['total_ganho']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <tfoot>
                                <tr class="table-secondary">
                                    <th class="text-center">Total Geral</th>
                                    <th class="text-center">R$ <?= htmlspecialchars($ganho['Total_Geral']) ?></th>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>