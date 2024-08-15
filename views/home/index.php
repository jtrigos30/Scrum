<?php require "views/shared/header.php" ?>

<div class="container">

    <?php 
    if(isset($_SESSION['cedula'])) {
        echo "<div class='container text-center'> <h4>Bienvenido al sistema usuario " . $_SESSION['cedula'] . "</h4>";
        echo "</div>";
    } else {
        echo "<p>No tiene acceso al sistema</p>";
    }

    ?>

    


</div>



<?php require "views/shared/footer.php" ?>