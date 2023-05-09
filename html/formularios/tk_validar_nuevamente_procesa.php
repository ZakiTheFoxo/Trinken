<?php
	include("conex.php");
	$link = Conectarse();

    $id = $_POST['id'];

	// Insertar imagen
    $target_path='../../imagenes/INE/';
    $archivo = $id . "." . pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
    $target_path = $target_path . $archivo;

    if(!move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_path)){
        exit("error subiendo archivo en $target_path");
    }

    mysqli_query($link, "UPDATE tk_usuarios SET imagen_ine = '$archivo', validado = 0 WHERE id = $id");

	mysqli_close($link);   
?>

	<script>
		window.location.replace('tk_validar.php');
	</script>
	