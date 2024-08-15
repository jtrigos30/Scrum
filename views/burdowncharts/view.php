<?php require "views/shared/header.php" ?>

<div class="container">
  <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
  <p>
    <span class="fw-bold">ID:</span>
    <?= $data['burdownchart']['idChart'] ?>
  </p>
  <p>
    <span class="fw-bold">Nombre del Proyecto:</span>
    <?= $data['burdownchart']['nomBacklog'] ?>
  </p>
  <p>
    <span class="fw-bold">Numero del Sprint:</span>
    <?= $data['burdownchart']['numSprint'] ?>
  </p>

  <a href="index.php?controlador=burdownchart" class="btn btn-primary">Volver</a>
</div>

<?php require "views/shared/footer.php" ?>