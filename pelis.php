<?php
require_once('./clases/conexion.php');
include('./clases/valida.php');

$fecha = date('Y-m-d');
$sql_pelis = sprintf("SELECT * FROM peliculas where pel_fechae < %s and pel_fechaf > %s",
                    valida::convertir($mysqli,$fecha,"date"),
                    valida::convertir($mysqli,$fecha,"date"));

if ($q_pelis = mysqli_query($mysqli, $sql_pelis)) {

    /* obtener array asociativo */
    while ($r_pelis = mysqli_fetch_assoc($q_pelis)) {
        $nombre = $r_pelis["pel_nombre"].".".$r_pelis["pel_extens"];
        printf ("<div class='pelis'>
        <div class='titulo'>%s</div>
        <a href=''><img  src='./images/peliculas/%s' alt='raios xd'></a>
        </div>",
                ucwords($r_pelis['pel_nombre']),
                str_replace(" ","_",$nombre)
                );
    }

    /* liberar el conjunto de resultados */
    //mysqli_free_result($q_pelis);
}
?>