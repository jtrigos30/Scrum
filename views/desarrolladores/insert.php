<?php require "views/shared/header.php" ?>

  <div class="container">
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <form action="index.php?controlador=desarrollador&accion=store" method="post">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="habilidad" name="habilidad" placeholder="habilidad">
        <label for="habilidad">Fortalezas del Desarrollador</label>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idUser" name="idUser" aria-label="Floating label select example">
          <?php foreach($data['usuario'] as $item) { ?>
            <option value="<?= $item['idUser'] ?>"><?= $item['nomuser'] ?></option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el usuario a asignarle el rol</label>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
  
<?php require "views/shared/footer.php" ?>