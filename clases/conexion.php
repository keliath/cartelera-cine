<?php
$host = "localhost";
$user = "tester";
$pass = "1234";
$db = "pruebas";


date_default_timezone_get('UTC-5');
$mysqli = mysqli_connect($host, $user, $pass, $db);

if(!$mysqli){
    echo ("Error en conexion: ".mysql_error($mysqli));
}else{
    //echo "conexion exitosa";
}
?>