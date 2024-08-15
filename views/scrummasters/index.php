<?php require "views/shared/header.php" ?>
    
    <div class="container">
        <h1 class="text-center mb-3"><?= $data['titulo'] ?></h1>
        <a href="index.php?controlador=scrummaster&accion=insert" class="btn btn-secondary mb-3">Agregar un nuevo Scrum Master</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID de Scrum Master</th>
                    <th>ID del Usuario Asignado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['scrummasters'] as $item) { ?>
                    <tr>
                        <td><?= $item['idSmaster'] ?></td>
                        <td><?= $item['idUser']?></td>
                        <td>
                            <a href="index.php?controlador=scrummaster&accion=view&id=<?= $item['idSmaster'] ?>" class="btn btn-info">Ver más</a>
                            <a href="index.php?controlador=scrummaster&accion=edit&id=<?= $item['idSmaster'] ?>" class="btn btn-warning">Editar</a>
                            <a href="index.php?controlador=scrummaster&accion=delete&id=<?= $item['idSmaster'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php require "views/shared/footer.php" ?>