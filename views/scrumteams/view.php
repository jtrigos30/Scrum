<?php require "views/shared/header.php" ?>

<div class="container">
  <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
  <p>
    <span class="fw-bold">ID del Equipo Scrum:</span>
    <?= $data['scrumteams']['idSteams'] ?>
  </p>
  <p>
    <span class="fw-bold">Nombre del Equipo:</span>
    <?= $data['scrumteams']['nomteam'] ?>
  </p>
  <p>
    <span class="fw-bold">Scrum Master:</span>
    <?= $data['scrumteams']['nombreScrumMaster'] ?>
  </p>
  <p>
    <span class="fw-bold">Product Owner:</span>
    <?= $data['scrumteams']['nombreProductOwner'] ?>
  </p>
  <p>
    <span class="fw-bold">Desarrollador:</span>
    <?= $data['scrumteams']['nombreDesarrollador'] ?>
  </p>
  <p>
    <span class="fw-bold">Sprint Actual:</span>
    <?= $data['scrumteams']['sprintact'] ?>
  </p>

  <a href="index.php?controlador=scrumteams" class="btn btn-primary">Volver</a>
</div>

<?php require "views/shared/footer.php" ?>