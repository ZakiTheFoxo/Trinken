<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Registrar Repartidor</title>
		<style type="text/css">
			body{
				background-color: black;
				font-family: sans-serif;
			}

			table{
				background-image: url("../../imagenes/barra.png");
				background-repeat: no-repeat;
				border-radius: 8% / 16%;
				padding: 3%;
				background-size: 100% 100%;
			}

			input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
		</style>

		<script type="text/javascript">
			function verificarDatos(){
				// Validar Numero de Celular
				if(document.formulario.id.value.length == 0){
					alert("Tiene que escribir el ID del repartidor")
					document.formulario.id.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="POST" name="formulario" action="tk_eliminar_repartidor.php">
		<p><table align="center" width="30%">
			<tr>
				<td align="right">
					ID del repartidor:
				</td>
				<td>
				<input type="text" name="id" style="width: 6em">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<br><input type="button" value="Eliminar Repartidor" onclick="verificarDatos()">
				</td>
			</tr>
		</table></p>
		</form>

		<p><?php 
			if($_POST){
				$id = $_POST['id'];

				include("conex.php");
				$link = Conectarse();

				$result = mysqli_query($link, "
					SELECT *
					FROM tk_repartidores
					WHERE id = '$id';
				");

				if(mysqli_num_rows($result) > 0){
					printf('<form method="POST" name="formulario2" action="tk_eliminar_repartidor_procesa.php">
						<input type="hidden" name="id" value="%d">', $id);

					echo "<table align='center' cellspacing='20px'><tr><td colspan='2' align='center'><b>¿Estás seguro que quieres eliminar los siguientes datos?</b></td></tr>";

					printf("<tr><td>ID</td><td>Nombre</td><td>Apellidos</td><td>Correo</td><td>Celular</td><td>Sueldo</td><td>Comision</td></tr>");

					while($row = mysqli_fetch_array($result)){
						printf("<tr border><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>$%0.2f</td><td>%0.2f</td>", 
							$row["id"], $row["nombre"], $row["apellidos"], $row["correo_electronico"], $row["celular"], $row["sueldo"], $row["comision"]);
					}

					echo '<tr><td colspan="4" align="center"><input type="submit" value="Confirmar"></td>';
					echo '<td align="center"><input type="button" value="Cancelar" onclick="window.location.replace(\'tk_eliminar_repartidor.php\')"></td></tr></table></form>';
				}else{
					echo "<table align='center'><tr><td align='center'><b>No se encontró un proveedor con ese ID</b></td></tr></table>";
				}
				mysqli_free_result($result);
				mysqli_close($link);
			}
		?></p>
	</body>
</html>