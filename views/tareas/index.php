<?php require "views/shared/header.php" ?>
    
    <div class="container">
        <h1 class="text-center mb-3"><?= $data['titulo'] ?></h1>
        <a href="index.php?controlador=tarea&accion=insert" class="btn btn-secondary mb-3">Agregar un nueva tarea</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID de Tarea</th>
                    <th>Estado de la Tarea</th>
                    <th>Prioridad de la Tarea</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['tareas'] as $item) { ?>
                    <tr>
                        <td><?= $item['idTarea'] ?></td>
                        <td><?= $item['estado']?></td>
                        <td><?= $item['prioridad']?></td>
                        <td>
                            <a href="index.php?controlador=tarea&accion=view&id=<?= $item['idTarea'] ?>" class="btn btn-info">Ver más</a>
                            <a href="index.php?controlador=tarea&accion=edit&id=<?= $item['idTarea'] ?>" class="btn btn-warning">Editar</a>
                            <a href="index.php?controlador=tarea&accion=delete&id=<?= $item['idTarea'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php require "views/shared/footer.php" ?>