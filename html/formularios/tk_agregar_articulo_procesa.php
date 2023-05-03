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
          VALUES('$arti', '$prec', '$categ', '$desc', '$cant' ,'$row[id]');") or die(mysqli_error($link));

    // Insertar imagen
    $result = mysqli_query($link, "SELECT id FROM tk_articulos WHERE nombre = '$arti'");
    $row = mysqli_fetch_array($result);

    $target_path='../../imagenes/Productos/';
    $archivo = $row['id'] . "." . pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
    $target_path = $target_path . $archivo;

    if(!move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_path)){
        exit("error subiendo archivo en $target_path");
    }

    mysqli_query($link, "UPDATE tk_articulos SET imagen = '$archivo' WHERE id = $row[id]");

    mysqli_close($link);   
?>

<script>
    window.location.replace('tk_articulo.php?articulo=1');
</script>