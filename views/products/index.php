<?php require "views/shared/header.php" ?>
    
    <div class="container">
        <h1 class="text-center mb-3"><?= $data['titulo'] ?></h1>
        <a href="index.php?controlador=productbacklog&accion=insert" class="btn btn-secondary mb-3">Crear un nuevo Backlog de Producto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID del Backlog</th>
                    <th>Nombre del Backlog</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['productbacklog'] as $item) { ?>
                    <tr>
                        <td><?= $item['idBacklog'] ?></td>
                        <td><?= $item['nomback']?></td>
                        <td><?= $item['estado']?></td>
                        <td>
                            <a href="index.php?controlador=productbacklog&accion=view&id=<?= $item['idBacklog'] ?>" class="btn btn-info">Ver más</a>
                            <a href="index.php?controlador=productbacklog&accion=edit&id=<?= $item['idBacklog'] ?>" class="btn btn-warning">Editar</a>
                            <a href="index.php?controlador=productbacklog&accion=delete&id=<?= $item['idBacklog'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php require "views/shared/footer.php" ?>