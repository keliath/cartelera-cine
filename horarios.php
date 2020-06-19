<?php 
require_once('./clases/conexion.php');
include('./security.php');
include('./clases/valida.php');

if(!isset($_GET['id'])){
    header('location:./');
}

$sql_pelis = sprintf("Select * from peliculas where id_pelicu = %s",
                    valida::convertir($mysqli,$_GET['id'],"int"));
$q_pelis = mysqli_query($mysqli,$sql_pelis);
$r_pelis = mysqli_fetch_assoc($q_pelis);

if(isset($_POST['guardar'])){
    $aux;
    foreach($_POST as $valor){
        if($valor[0] != 'A'){
            $aux[] = $valor;
        }
    }
    $cadena = implode(',',$aux);
    
    $sql_horas = sprintf("Insert into horarios")
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
        <form action="" method="post" class="form">
            <?php
            echo "<h2>Asignando horarios para: ".ucwords($r_pelis['pel_nombre'])."</h2><hr>";
            for($x=15; $x<=21; $x++){
                echo "<label><input type='checkbox' name='hora$x' value='$x'>$x:00</label>";
            }
            ?>
            <input type="submit" name="guardar" value="Asignar horario">
        </form>
    </main>
</body>
</html>