<?php require "views/shared/header.php" ?>

  <div class="container">
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <form action="index.php?controlador=burdownchart&accion=update" method="post">
      <input type="hidden" name="idChart" value="<?= $data['idChart'] ?>">
      <div class="form-floating mb-3">
        <select class="form-select" id="idBacklog" name="idBacklog" aria-label="Floating label select example">
          <?php foreach($data['productbacklog'] as $proyecto) { ?>
            <?php $selected = ($proyecto['idBacklog'] == $data['productbacklog']['idBacklog']) ? 'selected' : ''; ?>
            <option value="<?= $proyecto['idBacklog'] ?>" <?= $selected ?>>
              <?= $proyecto['nomback'] ?>
            </option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el proyecto</label>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idSprint" name="idSprint" aria-label="Floating label select example">
          <?php foreach($data['sprint'] as $sprint) { ?>
            <?php $selected = ($sprint['idSprint'] == $data['sprint']['idSprint']) ? 'selected' : ''; ?>
            <option value="<?= $sprint['idSprint'] ?>" <?= $selected ?>>
              <?= $sprint['numsprint'] ?>
            </option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el numero de sprint</label>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
  
<?php require "views/shared/footer.php" ?>