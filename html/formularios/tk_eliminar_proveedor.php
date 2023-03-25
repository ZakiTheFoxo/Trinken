<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Eliminar Proveedor</title>
		<style type="text/css">
			body{
				background-color: black;
				font-family: sans-serif;
			}

			table{
				background-image: url("../../imagenes/barra.png");
				background-repeat: no-repeat;
				border-radius: 6% / 16%;
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
				if(document.formulario.id_emp.value.length == 0){
					alert("Tiene que escribir el ID de la Empresa")
					document.formulario.id_emp.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="POST" name="formulario" action="tk_eliminar_proveedor.php">
			<p><table align="center" width="30%">
				<tr>
					<td align="right">
						ID de la empresa:
					</td>
					<td>
					<input type="text" name="id_emp" style="width: 6em">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Eliminar Proveedor" onclick="verificarDatos()">
					</td>
				</tr>
			</table></p>
		</form>

		<p><?php 
			if($_POST){
				$id = $_POST['id_emp'];

				include("conex.php");
				$link = Conectarse();

				$result = mysqli_query($link, "
					SELECT *
					FROM tk_proveedores
					WHERE id = '$id';
				");

				if(mysqli_num_rows($result) > 0){
					printf('<form method="POST" name="formulario2" action="tk_eliminar_proveedor_procesa.php">
						<input type="hidden" name="id" value="%d">', $id);

					echo "<table align='center' cellspacing='20px'><tr><td colspan='2' align='center'><b>¿Estás seguro que quieres eliminar los siguientes datos?</b></td></tr>";

					printf("<tr><td>ID</td><td>Nombre</td><td>Correo</td><td>Celular</td></tr>");

					while($row = mysqli_fetch_array($result)){
						printf("<tr border><td>%d</td><td>%s</td><td>%s</td><td>%s</td>", 
							$row["id"], $row["nombre_de_la_empresa"], $row["correo_electronico"], $row["celular"]);
					}

					echo '<tr><td colspan="2" align="center"><input type="submit" value="Confirmar"></td>';
					echo '<td align="center"><input type="button" value="Cancelar" onclick="window.location.replace(\'tk_eliminar_proveedor.php\')"></td></tr></table></form>';
				}else{
					echo "<table align='center'><tr><td align='center'><b>No se encontró un proveedor con ese ID</b></td></tr></table>";
				}
				mysqli_free_result($result);
				mysqli_close($link);
			}
		?></p>
	</body>
</html>