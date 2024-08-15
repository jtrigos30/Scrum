<?php require "views/shared/header.php" ?>

<div class="container">
  <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
  <p>
    <span class="fw-bold">ID del Sprint:</span>
    <?= $data['sprint']['idSprint'] ?>
  </p>
  <p>
    <span class="fw-bold">Numero del Sprint:</span>
    <?= $data['sprint']['numsprint'] ?>
  </p>
  <p>
    <span class="fw-bold">Nombre del Equipo Scrum:</span>
    <?= $data['sprint']['nombreEquipo'] ?>
  </p>
  <p>
    <span class="fw-bold">Fecha Inicial:</span>
    <?= $data['sprint']['fechaini'] ?>
  </p>
  <p>
    <span class="fw-bold">Fecha Final:</span>
    <?= $data['sprint']['fechafin'] ?>
  </p>
  <p>
    <span class="fw-bold">Estado:</span>
    <?= $data['sprint']['estado'] ?>
  </p>

  <a href="index.php?controlador=sprint" class="btn btn-primary">Volver</a>
</div>

<?php require "views/shared/footer.php" ?>