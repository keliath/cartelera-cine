<?php
include('security.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Cine</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="icon" type="image/png" href="./images/logo.png">
    </head>
    <body>
        <?php 
        include('headfoot.php');
        ?>

        <nav>
            <a href="./">Home</a>
            <a href="./close.php" class="cerrar">cerrar sesion</a>
        </nav><br>

        <main>
               <?php
            include('./pelis.php');
            ?>

        </main>
    </body>

</html>