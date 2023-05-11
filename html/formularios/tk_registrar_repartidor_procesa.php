<p><?php
	include("conex.php");
	$link = Conectarse();

	$nom = $_POST['nombre'];
	$ap = $_POST['apellido'];
	$cel = $_POST['celnum'];
	$email = $_POST['correo'];
	$sueldo = $_POST['sueldo'];
	$comi = $_POST['comision'];
	$fecha = $_POST['fecha'];
	$contrasena = $_POST['contrasena'];

	mysqli_query($link, "INSERT INTO tk_repartidores(nombre, apellidos, correo_electronico, celular, sueldo, comision)
		VALUES('$nom', '$ap', '$email','$cel', '$sueldo', '$comi');") or die(mysqli_error($link));

	mysqli_query($link, "INSERT INTO tk_usuarios(nombre, apellidos, fecha_nacimiento, correo_electronico, celular, contrasena, administrador)
		VALUES('$nom', '$ap', '$fecha','$email','$cel', '$contrasena', 2);") or die(mysqli_error($link));

	mysqli_close($link);

?></p>
<script>   
    window.location.replace('tk_repartidor.php?repartidor=1');
</script>