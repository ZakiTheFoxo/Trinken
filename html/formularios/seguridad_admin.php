<?php 
    session_start();

    if(!$_SESSION){
        header("Location: tk_inicio_sesion.php");

        exit();
    }else{
        include "conex.php";
        $link = Conectarse();

        if(isset($_SESSION['autenticado'])){
            $id = $_SESSION['autenticado'];

            $result = mysqli_query($link, "SELECT administrador FROM tk_usuarios WHERE id = '$id'");
            $row = mysqli_fetch_array($result);

            // Admin
            if($row['administrador'] != '1'){
                header("Location: ../body.php");

                exit();
            }
        }
    }
?>