<?php require "views/shared/header.php" ?>
    
    <div class="container">
        <h1 class="text-center mb-3"><?= $data['titulo'] ?></h1>
        <a href="index.php?controlador=usuario&accion=insert" class="btn btn-secondary mb-3">Crear un nuevo Usuario</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID del Usuario</th>
                    <th>Nombre del Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['usuario'] as $item) { ?>
                    <tr>
                        <td><?= $item['idUser'] ?></td>
                        <td><?= $item['nomuser']?></td>
                        <td>
                            <a href="index.php?controlador=usuario&accion=view&id=<?= $item['idUser'] ?>" class="btn btn-info">Ver más</a>
                            <a href="index.php?controlador=usuario&accion=edit&id=<?= $item['idUser'] ?>" class="btn btn-warning">Editar</a>
                            <a href="index.php?controlador=usuario&accion=delete&id=<?= $item['idUser'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php require "views/shared/footer.php" ?>