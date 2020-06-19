<?php
session_start();

if(!isset($_SESSION['user'])){//donde 'user' es la variable de sesion asignada del usuario
    header('location:./?nao');
    exit;
}

?>