<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];

    mysqli_query($link, "UPDATE tk_pedidos SET
    estado = 'COMPLETADO', id = $id") or die(mysqli_error($link));

    mysqli_close($link);   
    ?>
    <script>
        alert('Pedido Completado');
        window.history.go(-2);
    </script>
