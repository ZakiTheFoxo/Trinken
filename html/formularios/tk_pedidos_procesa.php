<?php 
    include("conex.php");
    $link = Conectarse();

    mysqli_query($link, "UPDATE tk_pedidos SET
    estado = 'COMPLETADO' where id = $id") or die(mysqli_error($link));

    mysqli_close($link);   
    ?>
    <script>
        alert('Pedido Completado');
        window.history.go(-2);
    </script>
