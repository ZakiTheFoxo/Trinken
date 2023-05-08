<?php 
    include("conex.php");
    $link = Conectarse();

    
    $correo = $_POST['correo'];
    $cel = $_POST['celnum'];
    $contra = $_POST['contra'];
    
    if($contra != "") {
        mysqli_query($link, "UPDATE tk_usuarios SET
        correo_electronico = '$correo', celular = $cel, contrasena = $contra WHERE id = $id") or die(mysqli_error($link));
    } else {
        mysqli_query($link, "UPDATE tk_usuarios SET
        correo_electronico = '$correo', celular = $cel WHERE id = $id") or die(mysqli_error($link));
    }

    mysqli_close($link);   
?>

<script>
    window.location.replace('tk_editar_perfil.php?editarperfil=1');
</script>