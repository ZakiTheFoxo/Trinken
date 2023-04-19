<?php 
    include("conex.php");
    include("seguridad.php");
    $link = Conectarse();

    $ato_id=$_POST["ato"];
    $exist=$_POST["existencia"];
    $cte_id = $_SESSION['autenticado'];

    mysqli_query($link, "INSERT INTO tk_carrito(ato_id, cte_id, cantidad_pedida)
          VALUES('$ato_id', '$cte_id', '$exist');") or die(mysqli_error($link));

    mysqli_close($link);   
?>

<script>
    alert("¡Artículo agregado exitosamente!");
    window.location.replace('../../body.php');
</script>