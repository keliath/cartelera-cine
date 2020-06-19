<?php
require_once('./clases/conexion.php');
include('./security.php');
include('./clases/valida.php');

$fecha = date('Y-m-d');
$sql_pelis = sprintf("select * from peliculas where pel_fechae < %s and pel_fechaf > %s",
                     valida::convertir($mysqli,$fecha,"date"),
                     valida::convertir($mysqli,$fecha,"date"));
$q_pelis = mysqli_query($mysqli, $sql_pelis);

if(isset($_GET['ok'])){
    echo "<script>alert('Pelicula modificada correctamente')</script>";
}
if(isset($_GET['err'])){
    echo "<script>alert('Error al modificar pelicula')</script>";
}

if(isset($_POST['modificar'])){
    if(isset($_GET['inf'])){
        header("location:./updpeli.php?id=".$_POST['peli']);
    }
    if(isset($_GET['h'])){
        header("location:./horarios.php?id=".$_POST['peli']);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Cine</title>
        <link rel="icon" type="image/png" href="./images/logo.png">
        <link rel="stylesheet" type="text/css" href="./css/styles.css">
    </head>
    <body>
        <?php
        include('./headfoot.php');
        include('./menuad.php');
        ?>

        <main>
            <form  method="post" class="form" name="frm">
                <?php 
                if(isset($_GET['inf'])){
                    echo "<h2>Modificar pelicula</h2>";
                }
                if(isset($_GET['h'])){
                    echo "<h2>Modificar Horarios</h2>";
                }
                ?>
                
                <select name="peli" required>
                    <option value="">Seleccionar pelicula</option>
                    <?php
                    while($r_pelis = mysqli_fetch_assoc($q_pelis)){
                        $id = $r_pelis['id_pelicu'];
                        $nombre = $r_pelis['pel_nombre'];
                        $opciones = sprintf("<option value='%s'>%s</option>",
                                            $id,
                                            $nombre);
                        echo $opciones;
                    }

                    ?>
                </select>
                <input type="submit" name="modificar" value="Modificar" >
            </form>
        </main>
    </body>
</html>