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

				// Validar número de celular
				if(document.formulario.celnum.value.length == 0){
					alert("Tiene que escribir su Número de Celular")
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

			<p><?php 
				if($_GET){
					$nom = $_GET['nombre'];
					$ap = $_GET['apellido'];
					$cel = $_GET['celnum'];
					$email = $_GET['correo'];
					$sueldo = $_GET['sueldo'];
					$comi = $_GET['comision'];

					echo "<table align='center'><tr><td colspan='2' align='center'><b>Se almacenaron los siguientes datos:</b></td></tr>";

					echo "<tr><td align='right' width='50%'>Nombre:</td><td align='left'>$nom</td></tr>";
					echo "<tr><td align='right'>Apellido:</td><td align='left'>$ap</td></tr>";
					echo "<tr><td align='right' width='50%'>Número de Celular:</td><td align='left'>$cel</td></tr>";
					echo "<tr><td align='right'>Correo:</td><td align='left'>$email</td></tr>";
					echo "<tr><td align='right' width='50%'>Sueldo:</td><td align='left'>$$sueldo</td></tr>";
					echo "<tr><td align='right'>Comisión:</td><td align='left'>$comi%</td></tr>";

					echo '<tr><td colspan="2" align="center"><input type="button" value="Volver al Menú" onclick="window.location.replace(\'../body.html\')"></td></tr></table>';
				}
			?></p>
		</form>
	</body>
</html>