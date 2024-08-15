<?php require "views/shared/header.php" ?>

  <div class="container">
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <form action="index.php?controlador=tarea&accion=update" method="post">
    <input type="hidden" name="idTarea" value="<?= $data['idTarea'] ?>">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="estado" name="estado" placeholder="estado" value="<?= $data['tarea']['estado'] ?>">
        <label for="estado">Estado</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="prioridad" name="prioridad" placeholder="prioridad" value="<?= $data['tarea']['prioridad'] ?>">
        <label for="prioridad">Prioridad</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="descrip" name="descrip" placeholder="descrip" value="<?= $data['tarea']['descrip'] ?>">
        <label for="descrip">Descripcion</label>
      </div>
      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="horas" name="horas" placeholder="horas" value="<?= $data['tarea']['horas'] ?>">
        <label for="horas">Tiempo de trabajo en horas</label>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idBacklog" name="idBacklog" aria-label="Floating label select example">
          <?php foreach($data['productbacklog'] as $user) { ?>
            <?php $selected = ($user['idBacklog'] == $data['productbacklog']['idBacklog']) ? 'selected' : ''; ?>
            <option value="<?= $user['idBacklog'] ?>" <?= $selected ?>>
              <?= $user['nomback'] ?>
            </option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el nombre del Backlog</label>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idSprint" name="idSprint" aria-label="Floating label select example">
          <?php foreach($data['sprint'] as $user) { ?>
            <?php $selected = ($user['idSprint'] == $data['sprint']['idSprint']) ? 'selected' : ''; ?>
            <option value="<?= $user['idSprint'] ?>" <?= $selected ?>>
              <?= $user['numsprint'] ?>
            </option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el numero del Sprint</label>
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