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

	// Insertar imagen
    $result = mysqli_query($link, "SELECT MAX(id) as id FROM tk_usuarios WHERE nombre = '$nom';");
    $row = mysqli_fetch_array($result);

    $target_path='../../imagenes/INE/';
    $archivo = $row['id'] . "." . pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
    $target_path = $target_path . $archivo;

    if(!move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_path)){
        exit("error subiendo archivo en $target_path");
    }

    mysqli_query($link, "UPDATE tk_usuarios SET imagen_ine = '$archivo' WHERE id = $row[id]");

	mysqli_close($link);   
?>

	<script>
		window.location.replace('tk_inicio_sesion.php');
	</script>
	