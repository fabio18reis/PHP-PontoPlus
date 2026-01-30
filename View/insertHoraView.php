
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar Ponto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body.bg-light {
            background: linear-gradient(
                rgba(255,255,255,0.7), 
                rgba(200,220,255,0.7)
            ), url('https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .card {
            background: rgba(255,255,255,0.95);
            border-radius: 1rem;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0"><i class="fa-solid fa-calendar-plus"></i> Registrar Ponto</h3>
                    </div>
                    <div class="card-body">
                        <form action="../Controller/insertHoraController.php" method="post" action="../Controller/insertHoraController.php">
                            <div class="mb-3">
                                <label for="data" class="form-label">Data</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div>
                            <div class="mb-3">
                                <label for="inicio" class="form-label">Início</label>
                                <input type="time" class="form-control" id="inicio" name="inicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="fim" class="form-label">Fim</label>
                                <input type="time" class="form-control" id="fim" name="fim" required>
                            </div>
                            <div class="mb-3">
                                <label for="almoco" class="form-label">Almoço (Saída)</label>
                                <input type="time" class="form-control" id="almoco" name="almoco" required>
                            </div>
                            <div class="mb-3">
                                <label for="volta_almoco" class="form-label">Volta Almoço</label>
                                <input type="time" class="form-control" id="volta_almoco" name="volta_almoco" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa-solid fa-check"></i> Enviar
                                </button>
                                <a href="home.php" class="btn btn-outline-primary">
                                    <i class="fa-solid fa-arrow-left"></i> Voltar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>