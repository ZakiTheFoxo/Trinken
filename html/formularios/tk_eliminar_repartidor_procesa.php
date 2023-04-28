<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];

    mysqli_query($link, "DELETE FROM tk_repartidores WHERE id = '$id';");

    mysqli_close($link);
?>

<script>
    window.location.replace('tk_eliminar_repartidor.php?borrarrepartidor=1');
</script>