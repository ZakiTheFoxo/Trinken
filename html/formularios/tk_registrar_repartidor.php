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
			function crearCuenta(){
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

				// Validar correo
				if(document.formulario.correo.value.length == 0){
					alert("Tiene que escribir su Correo")
					document.formulario.correo.focus()
					return 0;
				};

				// Validar número de celular y longitud
				if(document.formulario.celnum.value.length == 0){
					alert("Tiene que escribir su Número de Celular")
					document.formulario.celnum.focus()
					return 0;
				};

				if(document.formulario.celnum.value.length != 10){
					alert("El Número Celular debe contener 10 digitos")
					document.formulario.celnum.focus()
					return 0;
				};

				// Validar Sueldo
				if(document.formulario.sueldo.value.length == 0){
					alert("Tiene que ingresar su Sueldo")
					document.formulario.sueldo.focus()
					return 0;
				};

				// Validar Comision
				if(document.formulario.comision.value.length == 0){
					alert("Tiene que ingresar su Comision")
					document.formulario.comision.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="POST" name="formulario" action="tk_registrar_repartidor_procesa.php">
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
						Número Celular:
					</td>
					<td>
						<input type="number" name="celnum" style="width: 6em" placeholder="0123456789">
					</td>
					
				</tr>

				<tr>
					<td align="right">
						Correo:
					</td>
					<td>
						<input type="email" name="correo" size="30%" placeholder="ejemplo@correo.com">
					</td>
					
				</tr>

				<tr>
					<td align="right">
						Sueldo:
					</td>
					<td>
						<input type="number" name="sueldo" style="width: 3em" placeholder="$">
					</td>
					
				</tr>

				<tr>
					<td align="right">
						Comision:
					</td>
					<td>
						<input type="number" name="comision" style="width: 3em" placeholder="%">
					</td>
					
				</tr>

				<tr>
					<td colspan="2" align="center">
						<input type="button" value="Registrar Repartidor" onclick="crearCuenta()">
					</td>
				</tr>
			</table></p>
		</form>
	</body>
</html>