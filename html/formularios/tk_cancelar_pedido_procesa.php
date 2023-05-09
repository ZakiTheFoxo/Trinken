<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];

    mysqli_query($link, "UPDATE tk_pedidos SET estado = 'CANCELADO' WHERE id = $id");

    $result = mysqli_query($link, "SELECT * FROM tk_ato_pedidos WHERE pdo_id = $id");

    while($row = mysqli_fetch_array($result)){
        $res = mysqli_query($link, "SELECT existencia FROM tk_articulos WHERE id = $row[ato_id]");
        $exis = mysqli_fetch_array($res);

        $nueva_exis = $exis['existencia'] + $row['cantidad_pedida'];

        mysqli_query($link, "UPDATE tk_articulos SET existencia = $nueva_exis WHERE id = $row[ato_id]");
    }

    mysqli_query($link, "DELETE FROM tk_ato_pedidos WHERE pdo_id = $id");

    mysqli_close($link);

?>

<script>
    window.location.replace('seguimientoPedido.php?cancelado=1');
</script>