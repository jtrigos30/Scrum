<?php require "views/shared/header.php" ?>

  <div class="container">
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <form action="index.php?controlador=sprint&accion=store" method="post">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="numsprint" name="numsprint" placeholder="numsprint">
        <label for="numsprint">Numero del Sprint</label>
      </div>
      <div class="form-floating mb-3">
        <input type="date" class="form-control" id="fechaini" name="fechaini" placeholder="fechaini">
        <label for="fechaini">Fecha Inicial del Sprint</label>
      </div>
      <div class="form-floating mb-3">
        <input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="fechafin">
        <label for="fechafin">Fecha Final del Sprint</label>
      </div>
      <div class="form-floating mb-3">
          <input type="text" class="form-control" id="estado" name="estado" placeholder="estado">
          <label for="estado">Estado del Sprint</label>
        </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idSteams" name="idSteams" aria-label="Floating label select example">
          <?php foreach($data['scrumteams'] as $item) { ?>
            <option value="<?= $item['idSteams'] ?>"><?= $item['nomteam'] ?></option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el Equipo Scrum</label>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
  
<?php require "views/shared/footer.php" ?>