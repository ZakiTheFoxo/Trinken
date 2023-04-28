<?php 
    include("conex.php");
    include("seguridad.php");
    $link = Conectarse();

    $ato_id=$_POST["ato"];
    $exist=$_POST["existencia"];
    $new_exist=0;
    $cte_id = $_SESSION['autenticado'];
    $sql = "SELECT * FROM tk_carrito where ato_id=$ato_id AND cte_id=$cte_id;";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result);
    if ($result->num_rows > 0) {
        $new_exist=$row["cantidad_pedida"]+$exist;
        mysqli_query($link, "UPDATE tk_carrito SET
        cantidad_pedida = '$new_exist' WHERE ato_id = $ato_id AND cte_id=$cte_id;") or die(mysqli_error($link));
    } 
    else {
        mysqli_query($link, "INSERT INTO tk_carrito(ato_id, cte_id, cantidad_pedida)
        VALUES('$ato_id', '$cte_id', '$exist');") or die(mysqli_error($link));
    }
    mysqli_close($link);   
?>

<script>
    alert("¡Artículo agregado exitosamente!");
    window.location.replace('../../body.php');
</script>