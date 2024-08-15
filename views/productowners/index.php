<?php require "views/shared/header.php" ?>
    
    <div class="container">
        <h1 class="text-center mb-3"><?= $data['titulo'] ?></h1>
        <a href="index.php?controlador=productowner&accion=insert" class="btn btn-secondary mb-3">Agregar un nuevo Product Owner</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID de Product Owner</th>
                    <th>ID del Usuario Asignado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['productowner'] as $item) { ?>
                    <tr>
                        <td><?= $item['idProduct'] ?></td>
                        <td><?= $item['idUser']?></td>
                        <td>
                            <a href="index.php?controlador=productowner&accion=view&id=<?= $item['idProduct'] ?>" class="btn btn-info">Ver más</a>
                            <a href="index.php?controlador=productowner&accion=edit&id=<?= $item['idProduct'] ?>" class="btn btn-warning">Editar</a>
                            <a href="index.php?controlador=productowner&accion=delete&id=<?= $item['idProduct'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php require "views/shared/footer.php" ?>