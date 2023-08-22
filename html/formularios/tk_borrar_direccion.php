<?php 
    include("seguridad.php");

    $direccion_linea_1=$_POST["direccion1"];
    $estado=$_POST["estado"];
	
    mysqli_query($link, "DELETE FROM tk_direccion_clientes WHERE direccion_linea_1='$direccion_linea_1' AND cte_id='$_SESSION[autenticado]';") or die(mysqli_error($link));

    mysqli_close($link);   
?>

<script>
    alert("La direccion se ha borrado exitosamente");
    window.location.replace('tk_editar_perfil.php');
</script>