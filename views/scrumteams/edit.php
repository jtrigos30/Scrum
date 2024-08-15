<?php require "views/shared/header.php" ?>

  <div class="container">
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <form action="index.php?controlador=scrumteams&accion=update" method="post">
    <input type="hidden" name="idSteams" value="<?= $data['idSteams'] ?>">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nomteam" name="nomteam" placeholder="nomteam" value="<?= $data['scrumteams']['nomteam'] ?>">
        <label for="nomteam">Nombre del Equipo</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="sprintact" name="sprintact" placeholder="sprintact" value="<?= $data['scrumteams']['sprintact'] ?>">
        <label for="sprintact">Sprint Actual</label>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idSmaster" name="idSmaster" aria-label="Floating label select example">
          <?php foreach($data['scrummaster'] as $user) { ?>
            <?php $selected = ($user['idSmaster'] == $data['scrummaster']['idSmaster']) ? 'selected' : ''; ?>
            <option value="<?= $user['idSmaster'] ?>" <?= $selected ?>>
              <?= $user['idSmaster'] ?>
            </option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el ID del Scrum Master</label>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idProduct" name="idProduct" aria-label="Floating label select example">
          <?php foreach($data['productowner'] as $user) { ?>
            <?php $selected = ($user['idProduct'] == $data['productowner']['idProduct']) ? 'selected' : ''; ?>
            <option value="<?= $user['idProduct'] ?>" <?= $selected ?>>
              <?= $user['idProduct'] ?>
            </option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el ID del Product Owner</label>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idDevelop" name="idDevelop" aria-label="Floating label select example">
          <?php foreach($data['desarrollador'] as $user) { ?>
            <?php $selected = ($user['idDevelop'] == $data['desarrollador']['idDevelop']) ? 'selected' : ''; ?>
            <option value="<?= $user['idDevelop'] ?>" <?= $selected ?>>
              <?= $user['idDevelop'] ?>
            </option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el ID del Desarrollador</label>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
  
<?php require "views/shared/footer.php" ?>