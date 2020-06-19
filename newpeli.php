<?php
require_once('./clases/conexion.php');
include('./security.php');
include('./clases/valida.php');

if(isset($_POST['guardar'])){
    
    $tmpNom = $_FILES['file']['tmp_name'];
    $pelicula = strtolower($_POST['pelicula']);
    $duracion = $_POST['duracion'];
    $sinopsis = $_POST['sinopsis'];

    $partes = explode(".", $_FILES['file']['name']);
    $ext =  $partes[count($partes)-1];

    $sql_guardar = sprintf("INSERT INTO peliculas(pel_nombre,pel_duraci,pel_sinops,pel_extens,pel_fechae,pel_fechaf) values (%s,%s,%s,%s,%s,%s)",
                           "'".$pelicula."'",
                           "'".$duracion."'",
                           "'".$sinopsis."'",
                           "'".$ext."'",
                          valida::convertir($mysqli,$_POST['fechae'],"date"),
                          valida::convertir($mysqli,$_POST['fechaf'],"date"));

    $q_guardar = mysqli_query($mysqli, $sql_guardar);

    if($q_guardar){
        $dir = "./images/peliculas/";
        $archivo = strtolower(str_replace(" ","_",$pelicula.".".$ext));
        $destino = $dir.$archivo;
        move_uploaded_file($tmpNom, $destino);
        
    }else{echo "<script>alert('Error al guardar archivo')</script>";}
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Cine</title>
        <link rel="stylesheet" type="text/css" href="./css/styles.css">
        <link rel="icon" type="image/png" href="./images/logo.png">
    </head>
    <body>
        <?php
        include('./headfoot.php');
        include('./menuad.php')
        ?>

        <main>


            <form method="post" enctype="multipart/form-data" class="form">
                <h3>Nueva pelicula</h3>
                <input class="input" type="text" name="pelicula" placeholder="Ingrese el nombre de la pelicula" required autocomplete="off">
                <span>duracion</span>
                <input  type="time" name="duracion"required>
                <textarea class="input" name="sinopsis" placeholder="Ingrese una sinopsis" required maxlength="256" rows="6"></textarea>
                <input  type="file" name="file" accept="image/x-png, image/jpeg, image/gif" >
                <span>Estreno</span>
                <input type="date" name="fechae" required>
                <span>Final de Estreno</span>
                <input type="date" name="fechaf" required>
                <input type="submit" name="guardar" value="Guardar">
            </form>
        </main>
    </body>
</html>