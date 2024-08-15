<?php include_once "views/shared/loginHeader.php"?>

<h1 class="text-center"> <?= $data['titulo'] ?></h1>

<div class="container text-center">

        <?php
            if(isset($data['error'])) {
                echo "<div class='alert alert-danger' role='alert'>  ";
                echo $data['error'];
                echo "</div>";
            }
        ?>
      <div class="form-signin">
        <form action="index.php?controlador=logeo&accion=register" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" >
                <label for="nombre">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cedula" placeholder="0123456789" maxlenght="10">
                <label for="cedula">Cedula</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" placeholder="name@gmail.com" >
                <label for="email">Correo Electrónico</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="contrasenia" placeholder="Contraseña" >
                <label for="password">Contraseña</label>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>
      <div class="container text-center">
            <?php echo 'Registrese al sistema o '; ?>
      </div>
      <div class="container">
        <a href="index.php?controlador=logeo&accion=verLogin" class="btn btn-primary">Inicie Sesión</a>
      </div>
  </div>



<?php include_once "views/shared/footer.php"?>