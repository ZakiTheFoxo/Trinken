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
				if(document.formulario.contrasena.value.length == 0){
					alert("Tiene que escribir su Contraseña")
					document.formulario.contrasena.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="POST" name="formulario" action="control.php">
			<p><table align="center" width="30%">
				<tr>
					<td align="right">
						Usuario (No. Celular):
					</td>
					<td>
						<input type="number" name="usuario" style="width: 8em" placeholder="+5210123456789">
					</td>
				</tr>
				<tr>
					<td align="right">
						Constraseña:
					</td>
					<td>
						<input type="password" name="contrasena" style="width: 8em">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Iniciar Sesión" onclick="verificarDatos()"><br><br>
						<input type="button" value="Registrarse" onclick="window.location.replace('tk_registrar_cuenta.php')">
					</td>
				</tr>
			</table></p>			
		</form>
	</body>
</html>