<?php
	include("conex.php");
	$link = Conectarse();
	$nom_emp = $_POST['nom_emp'];
	$email = $_POST['correo'];
	$celnum = $_POST['celnum'];
	mysqli_query($link, "INSERT INTO tk_proveedores(nombre_de_la_empresa, correo_electronico, celular)
	VALUES('$nom_emp', '$email', '$celnum');") or die(mysqli_error($link));
	mysqli_close($link);   
?>

	<script>
		window.location.replace('tk_proveedor.php?proveedor=1');
	</script>
	