<?php require "views/shared/header.php" ?>
    
    <div class="container">
        <h1 class="text-center mb-3"><?= $data['titulo'] ?></h1>
        <a href="index.php?controlador=desarrollador&accion=insert" class="btn btn-secondary mb-3">Crear un nuevo desarrollador</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID de Desarrollador</th>
                    <th>ID del Usuario Asignado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['desarrolladores'] as $item) { ?>
                    <tr>
                        <td><?= $item['idDevelop'] ?></td>
                        <td><?= $item['idUser']?></td>
                        <td>
                            <a href="index.php?controlador=desarrollador&accion=view&id=<?= $item['idDevelop'] ?>" class="btn btn-info">Ver más</a>
                            <a href="index.php?controlador=desarrollador&accion=edit&id=<?= $item['idDevelop'] ?>" class="btn btn-warning">Editar</a>
                            <a href="index.php?controlador=desarrollador&accion=delete&id=<?= $item['idDevelop'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php require "views/shared/footer.php" ?>