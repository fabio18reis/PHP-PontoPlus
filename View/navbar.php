<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid px-4">
    <!-- Logo / Nome do sistema -->
    <a class="navbar-brand fw-bold" href="home.php">
      <i class="bi bi-clock-history text-primary"></i> Ponto Plus+
    </a>

    <!-- Botão mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link fw-semibold" href="home.php"><i class="bi bi-house"></i> Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold" href="insertHoraView.php"><i class="bi bi-plus-circle"></i> Registrar Hora</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold" href="listarMinhasHorasView.php"><i class="bi bi-clock"></i> Minhas Horas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold text-danger" href="../Controller/logoutController.php"><i class="bi bi-box-arrow-right"></i> Sair</a>
        </li>
      </ul>

      <!-- Usuário à direita -->
      <div class="d-flex align-items-center ms-3">
        <i class="bi bi-person-circle fs-5 me-1"></i>
        <span><?php echo $_SESSION['user_profile_name'] ?></span>
      </div>
    </div>
  </div>
</nav>
