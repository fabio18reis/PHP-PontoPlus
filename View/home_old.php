<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - Controle de Ponto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-light">
    <?php include "navbar.php"; ?>
    
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center p-5">
                        <h1 class="mb-4 display-6">Bem-vindo!</h1>
                        <h5 class="mb-4 text-muted">Controle seu ponto de forma simples e rápida.</h5>
                        <p class="mb-4">
                            <span class="fw-bold">Hora Atual:</span>
                            <span id="clock" class="badge bg-secondary fs-5"></span>
                        </p>
                        <div class="d-grid gap-3 col-lg-10 mx-auto">
                            <a href="quantoFizView.php" class="btn btn-success btn-lg">
                                <i class="fa-solid fa-dollar-sign me-2"></i>Quanto eu fiz de $
                            </a>
                            <a href="listarMinhasHorasView.php" class="btn btn-info btn-lg">
                                <i class="fa-solid fa-clock me-2"></i>Minhas Horas
                            </a>
                            <a href="insertHoraView.php" class="btn btn-primary btn-lg">
                                <i class="fa-solid fa-calendar-check me-2"></i>Registrar Ponto
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Obtém a hora inicial do servidor em milissegundos
        var initialServerTime = <?php echo time() * 1000; ?>;

        function updateClock() {
            var now = new Date(initialServerTime);
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');

            var currentTime = hours + ':' + minutes + ':' + seconds;
            document.getElementById('clock').textContent = currentTime;

            // Atualiza o tempo do lado do cliente
            initialServerTime += 1000; // incrementa um segundo

            // Chama a atualização do relógio a cada segundo
            setTimeout(updateClock, 1000);
        }
        updateClock();
    </script>
</body>

</html>
