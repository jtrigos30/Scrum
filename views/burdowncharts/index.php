<?php require "views/shared/header.php" ?>
    
    <div class="container">
        <h1 class="text-center mb-3"><?= $data['titulo'] ?></h1>
        <a href="index.php?controlador=burdownchart&accion=insert" class="btn btn-secondary mb-3">Insertar nuevos datos</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Tabla</th>
                    <th>ID Proyecto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['burdownchart'] as $item) { ?>
                    <tr>
                        <td><?= $item['idChart'] ?></td>
                        <td><?= $item['idBacklog']?></td>
                        <td>
                            <a href="index.php?controlador=burdownchart&accion=view&id=<?= $item['idChart'] ?>" class="btn btn-info">Ver más</a>
                            <a href="index.php?controlador=burdownchart&accion=tabla&id=<?= $item['idChart'] ?>" class="btn btn-info">Tabla Burdown Chart</a>
                            <a href="index.php?controlador=burdownchart&accion=edit&id=<?= $item['idChart'] ?>" class="btn btn-warning">Editar</a>
                            <a href="index.php?controlador=burdownchart&accion=delete&id=<?= $item['idChart'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php require "views/shared/footer.php" ?>