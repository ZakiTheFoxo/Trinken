
<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];
    $tipo = $_POST['tipo'];

    $result = mysqli_query($link, "SELECT existencia FROM tk_articulos WHERE id = $id");
    $row = mysqli_fetch_array($result);

    if($tipo == 1){
        $cant = $row['existencia'] + $_POST['agregar'];
    }
    if($tipo == 2){
        $cant = $row['existencia'] - $_POST['quitar'];
    }

        mysqli_query($link, "UPDATE tk_articulos SET
        existencia = $cant WHERE id = $id") or die(mysqli_error($link));

    mysqli_close($link);   
?>

<script>
    window.location.replace('tk_articulo.php?articulo=4');
</script>