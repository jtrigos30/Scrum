<?php require "views/shared/header.php" ?>

<div class="container">
  <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
  <p>
    <span class="fw-bold">ID del Usuario:</span>
    <?= $data['usuario']['idUser'] ?>
  </p>
  <p>
    <span class="fw-bold">Nombre del Usuario:</span>
    <?= $data['usuario']['nomuser'] ?>
  </p>
  <p>
    <span class="fw-bold">Contacto del Usuario:</span>
    <?= $data['usuario']['contuser'] ?>
  </p>

  <a href="index.php?controlador=usuario" class="btn btn-primary">Volver</a>
</div>

<?php require "views/shared/footer.php" ?>