<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];
    $nom = $_POST['nom_usu'];
    $ape = $_POST['apellidos'];
    $fecha = $_POST['fecha_naci'];
    $correo = $_POST['correo'];
    $cel = $_POST['celnum'];
    $contra = $_POST['contra'];
    

    mysqli_query($link, "UPDATE tk_usuarios SET
    nombre = '$nom', apellidos = '$ape', fecha_nacimiento = '$fecha' ,correo_electronico = '$correo', celular = $cel, contrasena = $contra WHERE id = $id") or die(mysqli_error($link));

    mysqli_close($link);   
?>

<script>
    window.location.replace('tk_editar_perfil.php?editarperfil=1');
</script>