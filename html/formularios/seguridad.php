<?php 
    session_start();

    if(!$_SESSION){
        header("Location: tk_inicio_session.php");

        exit();
    }
?>