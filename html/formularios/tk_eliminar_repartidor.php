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
			function verificarCuenta(){
				// Validar nombre
				if(document.formulario.nombre.value.length == 0){
					alert("Tiene que escribir su Nombre")
					document.formulario.nombre.focus()
					return 0;
				};

				// Validar apellido
				if(document.formulario.apellido.value.length == 0){
					alert("Tiene que escribir su Apellido")
					document.formulario.nombre.focus()
					return 0;
				};

				// Validar Numero de Celular
				if(document.formulario.id_rep.value.length == 0){
					alert("Tiene que escribir el ID del repartidor")
					document.formulario.id_rep.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="GET" name="formulario">
			<p><table align="center" width="40%">
				<tr>
					<td align="right">
						Nombre(s):
					</td>

					<td>
						<input type="text" name="nombre" size="30%">
					</td>
				</tr>

				<tr>
					<td align="right">
						Apellidos:
					</td>

					<td>
						<input type="text" name="apellido" size="30%">
					</td>
				</tr>

				<tr>
					<td align="right">
						ID:
					</td>
					<td>
						<input type="text" name="id_rep" style="width: 6em">
					</td>	
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="button" value="Eliminar Repartidor" onclick="verificarCuenta()">
					</td>
				</tr>
			</table></p>

			<p><?php 
				if($_GET){
					$nom = $_GET['nombre'];
					$ap = $_GET['apellido'];
					$id_rep = $_GET['id_rep'];

					echo "<table align='center'><tr><td colspan='2' align='center'><b>¿Estás seguro que quieres eliminar los siguientes datos?</b></td></tr>";

					echo "<tr><td align='right' width='50%'>Nombre:</td><td align='left'>$nom</td></tr>";
					echo "<tr><td align='right'>Apellido:</td><td align='left'>$ap</td></tr>";
					echo "<tr><td align='right' width='50%'>ID:</td><td align='left'>$id_rep</td></tr>";

					echo '<tr><td align="center"><input type="button" value="Confirmar" onclick="window.location.replace(\'../body.html\')"></td>';
					echo '<td align="center"><input type="button" value="Cancelar" onclick="window.location.replace(\'tk_eliminar_repartidor.php\')"></td></tr></table>';
				}
			?></p>
		</form>
	</body>
</html>