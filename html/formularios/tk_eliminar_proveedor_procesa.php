<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];

    mysqli_query($link, "DELETE FROM tk_proveedores WHERE id = '$id';");

    mysqli_close($link);
?>

<script>
    window.location.replace('tk_proveedor.php?proveedor=3');
</script>