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
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card-custom {
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    .time-display {
      font-size: 2.2rem;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
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
  </nav>

  <!-- Menu Tabs -->
  <div class="container-fluid mt-3 px-4">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#"><i class="bi bi-grid"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-journal-text"></i> Registros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-people"></i> Colaboradores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-clock"></i> Horas Extras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-bar-chart"></i> Relatórios</a>
      </li>
    </ul>
  </div>

  <!-- Cards Dashboard -->
  <div class="container-fluid px-4 mt-4">
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
  </div>

  <!-- Registro de Ponto -->
  <div class="container-fluid px-4 mt-4">
    <div class="card card-custom p-4 text-center">
      <h6 class="text-muted">Registro de Ponto</h6>
      <p class="mb-1">10/09/2025</p>
      <div class="time-display text-dark">06:59:34</div>
      <div class="mt-3 d-flex justify-content-center gap-3">
        <button class="btn btn-success px-4"><i class="bi bi-box-arrow-in-right"></i> Entrada</button>
        <button class="btn btn-primary px-4"><i class="bi bi-pause-circle"></i> Pausa</button>
        <button class="btn btn-danger px-4"><i class="bi bi-box-arrow-right"></i> Saída</button>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
