<?php require "views/shared/header.php" ?>

<div class="container">
  <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
  <p>
    <span class="fw-bold">ID de Tarea:</span>
    <?= $data['tarea']['idTarea'] ?>
  </p>
  <p>
    <span class="fw-bold">Proyecto asignado:</span>
    <?= $data['tarea']['nombreBacklog'] ?>
  </p>
  <p>
    <span class="fw-bold">Estado:</span>
    <?= $data['tarea']['estado'] ?>
  </p>
  <p>
    <span class="fw-bold">Prioridad:</span>
    <?= $data['tarea']['prioridad'] ?>
  </p>
  <p>
    <span class="fw-bold">Tiempo de trabajo:</span>
    <?= $data['tarea']['horas'] ?> horas
  </p>
  <p>
    <span class="fw-bold">Descripcion:</span>
    <?= $data['tarea']['descrip'] ?>
  </p>
  <p>
    <span class="fw-bold">Desarrollador asignado:</span>
    <?= $data['tarea']['nombreDesarrollador'] ?>
  </p>
  

  <a href="index.php?controlador=tarea" class="btn btn-primary">Volver</a>
</div>

<?php require "views/shared/footer.php" ?>