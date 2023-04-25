<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];
    $nom = $_POST['nom_prov'];
    $correo = $_POST['correo'];
    $cel = $_POST['celnum'];

    mysqli_query($link, "UPDATE tk_proveedores SET
    nombre_de_la_empresa = '$nom', correo_electronico = '$correo', celular = $cel WHERE id = $id") or die(mysqli_error($link));

    mysqli_close($link);   
?>

<script>
    window.location.replace('tk_editar_proveedor.php?editarproveedor=1');
</script>