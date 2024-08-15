<?php require "views/shared/header.php" ?>

  <div class="container">
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <form action="index.php?controlador=scrumteams&accion=store" method="post">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nomteam" name="nomteam" placeholder="nomteam">
        <label for="nomteam">Nombre del Equipo</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="sprintact" name="sprintact" placeholder="sprintact">
        <label for="sprintact">Sprint Actual</label>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idSmaster" name="idSmaster" aria-label="Floating label select example">
          <?php foreach($data['scrummaster'] as $item) { ?>
            <option value="<?= $item['idSmaster'] ?>"><?= $item['idSmaster'] ?></option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el ID del Scrum Master</label>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idProduct" name="idProduct" aria-label="Floating label select example">
          <?php foreach($data['productowner'] as $item) { ?>
            <option value="<?= $item['idProduct'] ?>"><?= $item['idProduct'] ?></option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el ID del Product Owner</label>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idDevelop" name="idDevelop" aria-label="Floating label select example">
          <?php foreach($data['desarrollador'] as $item) { ?>
            <option value="<?= $item['idDevelop'] ?>"><?= $item['idDevelop'] ?></option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el ID del Desarrollador</label>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
  
<?php require "views/shared/footer.php" ?>