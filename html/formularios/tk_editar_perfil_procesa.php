<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];
    $correo = $_POST['correo'];
    $cel = $_POST['celnum'];
    $contra = md5($_POST['contra']);

    if($contra != "") {
        mysqli_query($link, "UPDATE tk_usuarios SET
        correo_electronico = '$correo', celular = $cel, contrasena = '$contra' WHERE id = $id") or die(mysqli_error($link));
    } else {
        mysqli_query($link, "UPDATE tk_usuarios SET
        correo_electronico = '$correo', celular = $cel WHERE id = $id") or die(mysqli_error($link));
    }

    mysqli_close($link);   
    ?>
    <script>
        window.history.go(-2);
    </script>
