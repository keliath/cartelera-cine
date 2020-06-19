<?php
require_once('./clases/conexion.php');
include('./clases/valida.php');

session_start();
if(isset($_SESSION['user'])){
    header('location:select.php');
}

if(isset($_POST['ingresar'])){
    $sql_login = sprintf("SELECT * FROM usuarios where usu_mail =%s and usu_pass =%s",
                    valida::convertir($mysqli,$_POST['mail'],'text'),
                    valida::convertir($mysqli,md5($_POST['pass']),'text'));
    $q_login = mysqli_query($mysqli, $sql_login) or die ("Error en login: ". mysqli_error($mysqli));
    $r_login = mysqli_fetch_assoc($q_login);
    $t_login = mysqli_num_rows($q_login);
    
    //echo $sql_login;exit;
    if($t_login == 0){
        header('location:./?err');
        exit;
    }else{
        $_SESSION['user'] = $r_login['usu_mail'];
        $_SESSION['nivel'] = $r_login['usu_nivel'];
        //echo $_SESSION['user'];
        header('location:select.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cine</title>
    <link rel="icon" type="image/png" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>

<body>

<main>
    <form method="post">
        <h2 class="testo">Login</h2>
        <input type="email" name="mail" id="mail" value="mail1@gmail.com">
        <input type="password" name="pass" id="pass" value="12345">
        <input type="submit" name="ingresar" id="ingresar" value="ingresar">
        <?php
        if(isset($_GET['err'])){
            echo "<span class='testo'>Usuario incorrecto</span>";
        }
        if(isset($_GET['nao'])){
            echo"<span class='testo'>No tiene acceso a esta  pagina</span>";
        }
        ?>
    </form>
</main>
</body>

</html>