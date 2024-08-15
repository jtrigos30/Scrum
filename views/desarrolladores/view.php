<?php require "views/shared/header.php" ?>

<div class="container">
  <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
  <p>
    <span class="fw-bold">ID del Desarrollador:</span>
    <?= $data['desarrollador']['idDevelop'] ?>
  </p>
  <p>
    <span class="fw-bold">Nombre del Desarrollador:</span>
    <?= $data['desarrollador']['nombreUsuario'] ?>
  </p>
  <p>
    <span class="fw-bold">Fortalezas del Desarrollador:</span>
    <?= $data['desarrollador']['habilidad'] ?>
  </p>

  <a href="index.php?controlador=desarrollador" class="btn btn-primary">Volver</a>
</div>

<?php require "views/shared/footer.php" ?>