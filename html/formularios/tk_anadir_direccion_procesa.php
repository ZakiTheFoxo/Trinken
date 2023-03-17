<?php
	include("conex.php");
	$link = Conectarse();
	$dir1 = $_POST['dir_1'];
	$dir2 = $_POST['dir_2'];
	$est = $_POST['estado'];
	$ciu = $_POST['ciudad'];
	$c_p = $_POST['c_postal'];
	$cte = $_POST['cliente'];
	if (!$dir2==""){
		mysqli_query($link, "INSERT INTO tk_direccion_clientes(direccion_linea_1, direccion_linea_2, estado, ciudad, codigo_postal, cte_id)
		VALUES('$dir1', '$dir2', '$est', '$ciu', '$c_p', '$cte');") or die(mysqli_error($link));
		mysqli_close($link);
	}
	else
	{
		mysqli_query($link, "INSERT INTO tk_direccion_clientes(direccion_linea_1, estado, ciudad, codigo_postal, cte_id)
		VALUES('$dir1', '$est', '$ciu', '$c_p', '$cte');") or die(mysqli_error($link));
		mysqli_close($link);
	}
?>

	<script>
		window.location.replace('tk_anadir_direccion.php');
	</script>
	