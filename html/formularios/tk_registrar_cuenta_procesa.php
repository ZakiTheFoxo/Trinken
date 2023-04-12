<?php
	include("conex.php");
	$link = Conectarse();
	$nom = $_POST['nombre'];
	$ap = $_POST['apellido'];
	$pass = $_POST['clave'];
	$pass = md5($pass);
	$bd = $_POST['fecha'];
	$cel = $_POST['celnum'];
	$email = $_POST['correo'];

	mysqli_query($link, "INSERT INTO tk_usuarios(nombre, apellidos, fecha_nacimiento, correo_electronico, celular, contrasena)
	VALUES('$nom', '$ap', '$bd', '$email', '$cel', '$pass');") or die(mysqli_error($link));
	mysqli_close($link);   
?>

	<script>
		window.location.replace('tk_inicio_sesion.php');
	</script>
	