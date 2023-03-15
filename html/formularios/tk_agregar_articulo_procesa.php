<?php 
    include("conex.php");
    $link = Conectarse();

    $arti = $_POST['nom_art'];
    $desc = $_POST['descripcion'];
    $prec = $_POST['precio'];
    $categ = $_POST['categoria'];
    $cant = $_POST['cantidad'];
    $prov = $_POST['proveedor'];

    mysqli_query($link, "INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
        VALUES('$arti', '$prec', '$categ', '$desc', '$cant', '$prov');") or die(mysqli_error($link));

    mysqli_close($link);   
?>

<script>
    window.location.replace('tk_agregar_articulo.php');
</script>