<?php 
    include("conex.php");
    $link = Conectarse();

    $arti = $_POST['nom_art'];
    $desc = $_POST['descripcion'];
    $prec = $_POST['precio'];
    $categ = $_POST['categoria'];
    $cant = $_POST['cantidad'];
    $prov = $_POST['proveedor'];

    $result = mysqli_query($link, "
        SELECT id
        FROM tk_proveedores
        WHERE nombre_de_la_empresa = '$prov';
    ");

    $row = mysqli_fetch_array($result);

    mysqli_query($link, "INSERT INTO tk_articulos(nombre, precio, categoria, descripcion, existencia, pvr_id)
        VALUES('$arti', '$prec', '$categ', '$desc', '$cant', '$row[id]');") or die(mysqli_error($link));

    mysqli_close($link);   
?>

<script>
    window.location.replace('tk_agregar_articulo.php?articuloagregado=1');
</script>