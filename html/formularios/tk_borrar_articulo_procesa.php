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
            unlink('../../imagenes/Productos/'.$row['imagen']);

    mysqli_query($link, "DELETE FROM tk_articulos WHERE id = '$id';");

    mysqli_close($link);
?>

<script>
    window.location.replace('tk_articulo.php?articulo=3');
</script>