
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Minhas Horas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-light">
    <?php include "navbar.php" ?>
    <div class="container my-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2 class="mb-4 text-secondary">Minhas Horas Registradas</h2>
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Data</th>
                                <th class="text-center">Hora de Entrada</th>
                                <th class="text-center">Almoço</th>
                                <th class="text-center">Retorno</th>
                                <th class="text-center">Hora de Saída</th>
                                <th class="text-center">Total de Extras</th>
                                <th class="text-center">Info!</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            session_start();
                            require_once "../Controller/listarHorasController.php";
                            foreach ($horasUser as $horaUser): ?>
                                <tr>
                                    <td class="text-center"><?= htmlspecialchars($horaUser['data']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($horaUser['hora_inicio']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($horaUser['almoco_saida']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($horaUser['almoco_volta']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($horaUser['hora_fim']) ?></td>                                    
                                    <td class="text-center"><?= htmlspecialchars($horaUser['Horas_trabalhadas']) ?></td>
                                    <td class="text-center">
                                        <!-- Status -->
                                        <span class="badge bg-success" title="Status OK">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </span>
                                        <!-- Editar -->
                                        <a href="editarHoraView.php?id=<?= urlencode($horaUser['id_registro']) ?>" class="btn btn-sm btn-outline-primary mx-1" title="Editar">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <!-- Apagar -->
                                        <a href="apagarHoraController.php?id=<?= urlencode($horaUser['id_registro']) ?>" class="btn btn-sm btn-outline-danger" title="Apagar" onclick="return confirm('Tem certeza que deseja apagar este registro?');">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>