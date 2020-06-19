<?php
session_start();
unset($_SESSION['user']);//quitar una valiarble de un array
session_destroy();//quitar todas las variables de sesion
header('location:./');
?>