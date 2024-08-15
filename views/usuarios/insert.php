<?php require "views/shared/header.php" ?>

  <div class="container">
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <form action="index.php?controlador=usuario&accion=store" method="post">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nomuser" name="nomuser" placeholder="nomuser">
        <label for="nomuser">Nombre del Usuario</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="contuser" name="contuser" placeholder="contuser">
        <label for="contuser">Contacto del Usuario</label>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
  
<?php require "views/shared/footer.php" ?>