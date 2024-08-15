<?php require "views/shared/header.php" ?>

  <div class="container">
    <h1 class="text-center my-5"><?= $data['titulo'] ?></h1>
    <form action="index.php?controlador=productbacklog&accion=store" method="post">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nomback" name="nomback" placeholder="nomback">
        <label for="nomback">Nombre del Backlog</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="estado" name="estado" placeholder="estado">
        <label for="estado">Estado del Backlog</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion">
        <label for="descripcion">Descripcion del Proyecto</label>
      </div>
      <div class="form-floating mb-3">
        <input type="date" class="form-control" id="fechaInicial" name="fechaInicial" placeholder="fechaInicial">
        <label for="fechaInicial">Fecha Inicial del Proyecto</label>
      </div>
      <div class="form-floating mb-3">
        <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" placeholder="fechaFinal">
        <label for="fechaFinal">Fecha Final del Proyecto</label>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
  
<?php require "views/shared/footer.php" ?>