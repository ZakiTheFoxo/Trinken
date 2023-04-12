<?php 
    include("conex.php");
    $link = Conectarse();

    $user = $_POST['usuario'];
    $pass = $_POST['contrasena'];
    $pass = md5($pass);

    $result = mysqli_query($link, "SELECT count(*) FROM tk_usuarios WHERE celular = '$user' AND contrasena = '$pass'");

    $row = mysqli_fetch_array($result);

    echo $row['celular']." = ".$user;
    echo $row['contrasena']." = ".$pass;

    if($row['count(*)'] == '1'){
        session_start();

        $result = mysqli_query($link, "SELECT id FROM tk_usuarios WHERE celular = '$user' AND contrasena = '$pass'");
        $row = mysqli_fetch_array($result);

        $_SESSION['autenticado'] = $row['id'];
        
        // header("Location: ../../body.php");
    }else {
        // header("Location: tk_inicio_sesion.php?errorusuario=1");
    }
?>