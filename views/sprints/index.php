<?php require "views/shared/header.php" ?>
    
    <div class="container">
        <h1 class="text-center mb-3"><?= $data['titulo'] ?></h1>
        <a href="index.php?controlador=sprint&accion=insert" class="btn btn-secondary mb-3">Crear un nuevo Sprint</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Numero del Sprint</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['sprints'] as $item) { ?>
                    <tr>
                        <td><?= $item['numsprint'] ?></td>
                        <td><?= $item['estado']?></td>
                        <td>
                            <a href="index.php?controlador=sprint&accion=view&id=<?= $item['idSprint'] ?>" class="btn btn-info">Ver más</a>
                            <a href="index.php?controlador=sprint&accion=edit&id=<?= $item['idSprint'] ?>" class="btn btn-warning">Editar</a>
                            <a href="index.php?controlador=sprint&accion=delete&id=<?= $item['idSprint'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php require "views/shared/footer.php" ?>