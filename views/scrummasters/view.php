<?php require "views/shared/header.php" ?>

<div class="container">
  <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
  <p>
    <span class="fw-bold">ID del Scrum Master:</span>
    <?= $data['scrummaster']['idSmaster'] ?>
  </p>
  <p>
    <span class="fw-bold">Nombre del Scrum Master:</span>
    <?= $data['scrummaster']['nombreUsuario'] ?>
  </p>
  <p>
    <span class="fw-bold">Certificaciones del Scrum Master:</span>
    <?= $data['scrummaster']['certificado'] ?>
  </p>

  <a href="index.php?controlador=scrummaster" class="btn btn-primary">Volver</a>
</div>

<?php require "views/shared/footer.php" ?>