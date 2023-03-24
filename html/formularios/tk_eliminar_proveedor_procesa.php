<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];

    mysqli_query($link, "DELETE FROM tk_proveedores WHERE id = '$id';");
    mysqli_query($link, "ALTER TABLE tk_proveedores AUTO_INCREMENT = 1;");

    mysqli_close($link);
?>

<script>
    window.location.replace('tk_eliminar_proveedor.php');
</script>