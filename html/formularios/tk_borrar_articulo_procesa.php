<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];

    $sql_del_files = "
            SELECT imagen
            FROM tk_articulos
            WHERE id = $id";

        $result = mysqli_query($link, $sql_del_files);
        $row = mysqli_fetch_array($result);

        if($row['imagen'])
            unlink('../../imagenes/productos/'.$row['imagen']);

    mysqli_query($link, "DELETE FROM tk_articulos WHERE id = '$id';");

    mysqli_close($link);
?>

<script>
    window.location.replace('tk_borrar_articulo.php?borrararticulo=1');
</script>