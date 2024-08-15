<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title><?= $data['titulo'] ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SCRUM TEAMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?controlador=home&accion=index">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Product Backlog
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?controlador=productbacklog&accion=index">Listar proyectos</a></li>
            <li><a class="dropdown-item" href="index.php?controlador=sprint&accion=index">Listar Sprints</a></li>
            <li><a class="dropdown-item" href="index.php?controlador=tarea&accion=index">Listar Tareas</a></li>
            <li><a class="dropdown-item" href="index.php?controlador=burdownchart&accion=index">Tablas Burdown Chart</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="index.php?controlador=usuario&accion=index">Listar usuarios</a></li>
            <li><a class="dropdown-item" href="index.php?controlador=desarrollador&accion=index">Desarrollador</a></li>
            <li><a class="dropdown-item" href="index.php?controlador=scrummaster&accion=index">Scrum Master</a></li>
            <li><a class="dropdown-item" href="index.php?controlador=productowner&accion=index">Product Owner</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Equipos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?controlador=scrumteams&accion=index">Listar equipos</a></li>
            <li><a class="dropdown-item" href="index.php?controlador=scrumteams&accion=insert">Crear nuevo equipo</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav">
        <?php
        if(isset($_SESSION['cedula'])) {
          echo "<li class='nav-item'>";
          echo "<a class='nav-link' href='index.php?controlador=logeo&accion=logout'>Salir</a>";
          echo "</li>";
        }
        ?>
      </ul>
    </div>
  </div>
</nav>