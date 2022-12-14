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
          <a class="nav-link active" aria-current="page" href="<?php echo RUTARAIZ; ?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTARAIZ; ?>paginas/secciones.php?id=1">Política</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTARAIZ; ?>paginas/secciones.php?id=8">Economía</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTARAIZ; ?>paginas/secciones.php?id=3">Policiales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTARAIZ; ?>paginas/secciones.php?id=4">Deportes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-contacto" href="<?php echo RUTARAIZ; ?>paginas/contacto.php">Contacto</a>
        </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['idUser'])): ?>
        <li class="nav-item dropdown ms-4">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi cuenta
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo RUTARAIZ; ?>adm/panel-adm.php">Panel</a></li>
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