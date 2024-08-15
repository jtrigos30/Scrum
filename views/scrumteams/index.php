<?php require "views/shared/header.php" ?>
    
    <div class="container">
        <h1 class="text-center mb-3"><?= $data['titulo'] ?></h1>
        <a href="index.php?controlador=scrumteams&accion=insert" class="btn btn-secondary mb-3">Agregar un nuevo Equipo Scrum</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID del Equipo</th>
                    <th>Nombre del Equipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['scrumteams'] as $item) { ?>
                    <tr>
                        <td><?= $item['idSteams'] ?></td>
                        <td><?= $item['nomteam']?></td>
                        <td>
                            <a href="index.php?controlador=scrumteams&accion=view&id=<?= $item['idSteams'] ?>" class="btn btn-info">Ver más</a>
                            <a href="index.php?controlador=scrumteams&accion=edit&id=<?= $item['idSteams'] ?>" class="btn btn-warning">Editar</a>
                            <a href="index.php?controlador=scrumteams&accion=delete&id=<?= $item['idSteams'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php require "views/shared/footer.php" ?>