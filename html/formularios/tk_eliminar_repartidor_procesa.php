<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];

    mysqli_query($link, "DELETE FROM tk_repartidores WHERE id = '$id';");
    mysqli_query($link, "ALTER TABLE tk_repartidores AUTO_INCREMENT = 1;");

    mysqli_close($link);
?>

<script>
    window.location.replace('tk_eliminar_repartidor.php');
</script>