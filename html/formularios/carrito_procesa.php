<?php 
    include("conex.php");
    include("seguridad.php");
    $link = Conectarse();

    $ato_id=$_POST["id"];
	
    mysqli_query($link, "DELETE FROM tk_carrito WHERE ato_id='$ato_id' AND cte_id='$_SESSION[autenticado]';") or die(mysqli_error($link));

    mysqli_close($link);   
?>

<script>
    alert("El artículo se ha borrado exitosamente");
    window.location.replace('carrito.php');
</script>