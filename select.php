<?php
require_once('./clases/conexion.php');
include('./security.php');

switch($_SESSION['nivel']){//donde la variable de sesion se le asignara el nivel del usuario con una consulta sql realizada en el script principal
    case 'admin':
        header('location:./admin.php');
        break;
    case 'user':
        header('location:./verpelis.php');
        break;
    default:
        header('location:./');
        break;
}
?>
