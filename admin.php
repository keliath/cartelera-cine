<?php
include('security.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Administracion</title>
        <link rel="icon" type="image/png" href="./images/logo.png">
        <link rel="stylesheet" type="text/css" href="./css/styles.css">
    </head>
    <body>

        <?php
        include('./headfoot.php');
        include('./menuad.php')
        ?>
        
        <main>
            <?php
            include('./pelis.php');
            ?>

        </main>
    </body>

</html>