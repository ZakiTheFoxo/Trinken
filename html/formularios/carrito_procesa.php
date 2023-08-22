<?php 
    include("seguridad.php");

    $num = $_POST['num'];
    $titular = $_POST['titular'];
    $mes = $_POST['mes'];
    $ccv = $_POST['ccv'];

    $total = $_POST['total'];

    $result = mysqli_query($link, "SELECT count(*) as rpr from tk_repartidores");
    $row = mysqli_fetch_array($result);

    $rpr_id = rand(1, $row['rpr']);
	
    mysqli_query($link, "INSERT INTO tk_pedidos (fecha, hora, estado, cte_id, rpr_id, total)
        VALUES (current_date(), time_format(curtime()-60000, '%H:%i:%s'), 'EN PROCESO', $_SESSION[autenticado], $rpr_id, $total);") or die(mysqli_error($link));

    $result = mysqli_query($link, "SELECT MAX(id) as id from tk_pedidos WHERE cte_id = $_SESSION[autenticado] AND estado = 'EN PROCESO'");
    $p_id = mysqli_fetch_array($result);
    
    $result = mysqli_query($link, "SELECT * from tk_carrito WHERE cte_id = $_SESSION[autenticado]");
    while($row = mysqli_fetch_array($result)){
        mysqli_query($link, "INSERT INTO tk_ato_pedidos VALUES($p_id[id], $row[ato_id], $row[cantidad_pedida]);");

        $res = mysqli_query($link, "SELECT existencia FROM tk_articulos WHERE id = $row[ato_id]");
        $exis = mysqli_fetch_array($res);

        $nueva_exis = $exis['existencia'] - $row['cantidad_pedida'];

        mysqli_query($link, "UPDATE tk_articulos SET existencia = $nueva_exis WHERE id = $row[ato_id]");
    }

    mysqli_query($link, "DELETE FROM tk_carrito WHERE cte_id = $_SESSION[autenticado]");

    mysqli_close($link);   
?>

<script>
    window.location.replace('seguimientoPedido.php');
</script>