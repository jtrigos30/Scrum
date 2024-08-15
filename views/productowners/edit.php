<?php require "views/shared/header.php" ?>

  <div class="container">
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <form action="index.php?controlador=productowner&accion=update" method="post">
    <input type="hidden" name="idProduct" value="<?= $data['idProduct'] ?>">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="experiencia" name="experiencia" placeholder="experiencia" value="<?= $data['productowner']['experiencia'] ?>">
        <label for="experiencia">Experiencia del Product Owner</label>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="idUser" name="idUser" aria-label="Floating label select example">
          <?php foreach($data['usuario'] as $user) { ?>
            <?php $selected = ($user['idUser'] == $data['usuario']['idUser']) ? 'selected' : ''; ?>
            <option value="<?= $user['idUser'] ?>" <?= $selected ?>>
              <?= $user['nomuser'] ?>
            </option>
          <?php } ?>
        </select>
        <label for="floatingSelect">Selecciona el usuario a asignarle el rol</label>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
  
<?php require "views/shared/footer.php" ?>