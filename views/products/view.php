<?php require "views/shared/header.php" ?>

<div class="container">
  <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
  <p>
    <span class="fw-bold">ID del Backlog:</span>
    <?= $data['productbacklog']['idBacklog'] ?>
  </p>
  <p>
    <span class="fw-bold">Nombre del Backlog:</span>
    <?= $data['productbacklog']['nomback'] ?>
  </p>
  <p>
    <span class="fw-bold">Estado del Backlog:</span>
    <?= $data['productbacklog']['estado'] ?>
  </p>
  <p>
    <span class="fw-bold">Descripcion del Proyecto:</span>
    <?= $data['productbacklog']['descripcion'] ?>
  </p>
  <p>
    <span class="fw-bold">Fecha Inicial del Proyecto:</span>
    <?= $data['productbacklog']['fechaInicial'] ?>
  </p>
  <p>
    <span class="fw-bold">Fecha Final del Proyecto:</span>
    <?= $data['productbacklog']['fechaFinal'] ?>
  </p>

  <a href="index.php?controlador=productbacklog" class="btn btn-primary">Volver</a>
</div>

<?php require "views/shared/footer.php" ?>