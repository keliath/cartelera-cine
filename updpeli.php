<?php
require_once('./clases/conexion.php');
include('./security.php');
include('./clases/valida.php');


$sql_pelis = sprintf("select * from peliculas where id_pelicu = %s",
                     valida::convertir($mysqli,$_GET['id'],"text"));
$q_pelis = mysqli_query($mysqli,$sql_pelis);
$r_pelis = mysqli_fetch_assoc($q_pelis);

if(isset($_POST['guardar'])){
    $sql_mod = sprintf("UPDATE peliculas SET pel_nombre = %s, pel_duraci = %s, pel_sinops = %s, pel_fechae = %s, pel_fechaf = %s WHERE id_pelicu = %s",
                       valida::convertir($mysqli,$_POST['pelicula'], "text"),
                       valida::convertir($mysqli,$_POST['duracion'], "text"),
                       valida::convertir($mysqli,$_POST['sinopsis'], "text"),
                       valida::convertir($mysqli,$_POST['fechae'], "date"),
                       valida::convertir($mysqli,$_POST['fechaf'], "date"),
                       valida::convertir($mysqli,$_POST['id'], "text"));
    if($q_mod = mysqli_query($mysqli, $sql_mod)){
        header('location:./selectpeli.php?ok');
    }else{
        header('location:./selectpeli.php?err');
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
            <form method="post" class="form">
                <h3>Modificar pelicula</h3>
                <input type="text" name="id" placeholder="lala" value="<?php echo $_GET['id']; ?>">
                <input class="input" type="text" name="pelicula" value="<?php echo $r_pelis['pel_nombre'];?>" placeholder="Ingrese el nombre de la pelicula" required autocomplete="off">
                <input class="input" type="time" name="duracion" value="<?php echo substr($r_pelis['pel_duraci'],0,5);?>" placeholder="Ingrese la duracion de la pelicula" required autocomplete="off">
                <textarea class="input" name="sinopsis" placeholder="Ingrese una sinopsis" required maxlength="256" rows="6"><?php echo $r_pelis['pel_sinops'];?></textarea>
                <input  type="file" name="file" accept="image/x-png, image/jpeg, image/gif" >
                <span>Estreno</span>
                <input type="date" name="fechae"  value="<?php echo date('Y-m-d',strtotime($r_pelis['pel_fechae']));?>">
                <span>Final de Estreno</span>
                <input type="date" name="fechaf" value="<?php echo date('Y-m-d',strtotime($r_pelis['pel_fechaf']));?>">
                <input type="submit" name="guardar" value="Guardar">
            </form>
        </main>
    </body>
</html>