<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];

    mysqli_query($link, "DELETE FROM tk_articulos WHERE id = '$id';");
    mysqli_query($link, "ALTER TABLE tk_articulos AUTO_INCREMENT = 1;");

    mysqli_close($link);
?>

<script>
    window.location.replace('tk_borrar_articulo.php?borrararticulo=1');
</script>