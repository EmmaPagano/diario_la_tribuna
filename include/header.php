<header>
<nav class="navbar navbar-expand-md">
  <div class="container">
    <a class="navbar-brand" href="<?php echo RUTARAIZ; ?>">
        
        <span>L</span><span>T</span>
        
        <p>La Tribuna</p>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <?php if(!isset($menuAdm)): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Política</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Economía</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Policiales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Deportes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-contacto" href="#">Contacto</a>
        </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['idUser'])): ?>
        <li class="nav-item dropdown ms-4">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi cuenta
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo RUTARAIZ; ?>adm/panel-adm.php">Panel</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo RUTARAIZ; ?>paginas/cerrar-sesion.php">Cerrar sesión</a></li>
          </ul>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
</header>