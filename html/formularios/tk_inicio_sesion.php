<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Inicio Sesion</title>
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
				// Validar usuario
				if(document.formulario.usuario.value.length == 0){
					alert("Tiene que escribir su Usuario")
					document.formulario.usuario.focus()
					return 0;
				};

				// Validar Contraseña
				if(document.formulario.contraseña.value.length == 0){
					alert("Tiene que escribir su Contraseña")
					document.formulario.contraseña.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="GET" name="formulario" action="tk_inicio_sesion.php">
			<p><table align="center" width="30%">
				<tr>
					<td align="right">
						Usuario (No. Celular):
					</td>
					<td>
						<input type="number" name="usuario" style="width: 6em" placeholder="0123456789">
					</td>
				</tr>
				<tr>
					<td align="right">
						Constraseña:
					</td>
					<td>
						<input type="password" name="contraseña" size="10%">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Iniciar Sesión" onclick="verificarDatos()"><br><br>
						<input type="button" value="Registrarse" onclick="window.location.replace('tk_registrar_cuenta.php')">
					</td>
				</tr>
			</table></p>
				
			<p><?php 
				if($_GET){
					$user = $_GET['usuario'];
					$pass = $_GET['contraseña'];

					echo "<table align='center'><tr><td colspan='2' align='center'><b>Se almacenaron los siguientes datos:</b></td></tr>";

					echo "<tr><td align='right' width='50%'>Usuario:</td><td align='left'>$user</td></tr>";
					echo "<tr><td align='right'>Contraseña:</td><td align='left'>$pass</td></tr>";

					echo '<tr><td colspan="2" align="center"><input type="button" value="Volver al Menú" onclick="window.location.replace(\'../body.html\')"></td></tr></table>';
				}
			?></p>			
		</form>
	</body>
</html>