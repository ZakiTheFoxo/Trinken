<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Registrar Repartidor</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/main.css">
	</head>

	<body>
		<p><?php
			$id = $_POST['id'];

			$result = mysqli_query($link, "
				SELECT *
				FROM tk_repartidores
				WHERE id = '$id';
			"); ?>

			<form method="POST" name="formulario2" action="tk_eliminar_repartidor_procesa.php">
				<input type="hidden" name="id" value="<?=$id?>">

			<div class='table-responsive'><table cellpadding='10px' align='center' cellspacing='20px'><tr><td colspan='7' align='center'><b>¿Estás seguro que quieres eliminar los siguientes datos?</b></td></tr>

			<tr><td>ID</td><td>Nombre</td><td>Apellidos</td><td>Correo</td><td>Celular</td><td>Sueldo</td><td>Comision</td></tr>

			<?php while($row = mysqli_fetch_array($result)){
				printf("<tr border><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>$%0.2f</td><td>%0.2f</td>", 
					$row["id"], $row["nombre"], $row["apellidos"], $row["correo_electronico"], $row["celular"], $row["sueldo"], $row["comision"]);
			} ?>

			<tr><td colspan="7" align="center"><input type="submit" class="btn btn-danger link" value="Confirmar">&nbsp;&nbsp;
			<input type="button" class="btn btn-secondary link" value="Cancelar" onclick="window.location.replace('tk_repartidor.php')"></td></tr></table></div></form>
			<?php mysqli_free_result($result);
			mysqli_close($link);?>
		</p>
	</body>

	<footer>
        <table id="footer" width="100%" align="center">
            <tr>
                <td align="left" width="33%">
                    <img src="../../imagenes/trfooter.png" width="40%">
                </td>

                <td align="center" width="33%">
                    ©2023 BARK Be Safe
                </td>

                <td align="right" width="33%">
                    <a href="https://www.facebook.com/TrinkenApp/" target="_blank">
                        <img src="../../imagenes/fb.png" width="10%"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://play.google.com/store/apps/details?id=com.trinken.android" target="_blank">
                        <img src="../../imagenes/ps.png" width="10%"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://www.instagram.com/trinkenbesafe/" target="_blank">
                            <img src="../../imagenes/ig.png" width="10%"></a>
                </td>
            </tr>
        </table>
    </footer>
</html>