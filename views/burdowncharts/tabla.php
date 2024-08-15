<?php require "views/shared/header.php" ?>
    
    <div class="container">
        <h1 class="text-center mb-3"><?= $data['titulo'] ?></h1>

        <table border_all="1">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>Trabajo Planeado</th>
                    <th>Trabajo Real</th>
                    <th>Diferencia</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tablaBurdown as $fecha => $datos) : ?>
    <tr>
        <td><?php echo $fecha; ?></td>
        <td><?php echo isset($datos['tiempo_planeado']) ? $datos['tiempo_planeado'] : 'Datos faltantes'; ?></td>
        <td><?php echo isset($datos['tiempo_real']) ? $datos['tiempo_real'] : 'Datos faltantes'; ?></td>
        <td><?php echo isset($datos['diferencia']) ? $datos['diferencia'] : 'Datos faltantes'; ?></td>
    </tr>
<?php endforeach; ?>

            </tbody>
        </table>
    </div>

<?php require "views/shared/footer.php" ?>