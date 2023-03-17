<?php 
    include("conex.php");
    $link = Conectarse();

    $user = $_POST['usuario'];
    $pass = md5($_POST['contrasena']);

    $result = mysqli_query($link, "SELECT count(*) FROM tk_usuarios WHERE celular = '$user' AND contrasena = '$pass'");

    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION["autenticado"] = "SI";
        header("Location: ../body.html");
    }else {
        header("Location: tk_inicio_sesion.php?errorusuario=1");
    }
?>