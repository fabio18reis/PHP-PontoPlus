<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Quanto Fiz Por Dia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include "navbar.php" ?>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Quanto Fiz Por Dia</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Data</th>
                        <th>Valor (R$)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    require_once "../Controller/quantoFizController.php";
                    foreach ($ganhos as $ganho): ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($ganho['data']) ?></td>
                            <td class="text-center">R$<?= htmlspecialchars($ganho['total_ganho']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS CDN (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>