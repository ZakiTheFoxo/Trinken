<?php 
    session_start();
    include "conex.php";
    $link = Conectarse();

    if(!$_SESSION){
        header("Location: tk_inicio_sesion.php");

        exit();
    } else {
        $result = mysqli_query($link, "SELECT validado FROM tk_usuarios WHERE id = $_SESSION[autenticado]");
        $row = mysqli_fetch_array($result);

        if($row['validado'] == 0){
            header("Location: tk_validar.php");

            exit();
        }

        if($row['validado'] == 1){
            header("Location: tk_validar_nuevamente.php");

            exit();
        }
    }
?>