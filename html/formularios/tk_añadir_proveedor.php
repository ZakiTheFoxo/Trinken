<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Añadir Proveedor</title>
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
				// Validar Nombre Empresa
				if(document.formulario.nom_emp.value.length == 0){
					alert("Tiene que escribir el Nombre de la Empresa")
					document.formulario.nom_emp.focus()
					return 0;
				};

				// Validar Correo
				if(document.formulario.correo.value.length == 0){
					alert("Tiene que escribir el Correo de la Empresa")
					document.formulario.correo.focus()
					return 0;
				};

				// Validar Numero de Celular
				if(document.formulario.celnum.value.length == 0){
					alert("Tiene que escribir el Número Celular de la Empresa")
					document.formulario.celnum.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="GET" name="formulario" action="tk_añadir_proveedor.php">
			<p><table align="center" width="40%">
				<tr>
					<td align="right">
						Nombre de la empresa:
					</td>
					<td>
						<input type="text" name="nom_emp" size="30%">
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
						Número Celular:
					</td>
					<td>
					<input type="number" name="celnum" style="width: 6em" placeholder="0123456789">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Registrar Proveedor" onclick="verificarDatos()">
					</td>
				</tr>
			</table></p>

			<p><?php 
				if($_GET){
					$nom_emp = $_GET['nom_emp'];
					$email = $_GET['correo'];
					$celnum = $_GET['celnum'];

					echo "<table align='center'><tr><td colspan='2' align='center'><b>Se almacenaron los siguientes datos:</b></td></tr>";

					echo "<tr><td align='right' width='50%'>Nombre de la Empresa:</td><td align='left'>$nom_emp</td></tr>";
					echo "<tr><td align='right'>Correo:</td><td align='left'>$email</td></tr>";
					echo "<tr><td align='right'>Número de Celular:</td><td align='left'>$celnum</td></tr>";

					echo '<tr><td colspan="2" align="center"><input type="button" value="Volver al Menú" onclick="window.location.replace(\'../body.html\')"></td></tr></table>';
				}
			?></p>	
		</form>
	</body>
</html>