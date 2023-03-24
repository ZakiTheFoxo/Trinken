<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

				// Validar Numero de Celular y longitud
				if(document.formulario.celnum.value.length == 0){
					alert("Tiene que escribir el Número Celular de la Empresa")
					document.formulario.celnum.focus()
					return 0;
				};
				
				if(document.formulario.celnum.value.length != 10){
					alert("El Número Celular de la Empresa debe contener 10 digitos")
					document.formulario.celnum.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="POST" name="formulario" action="tk_anadir_proveedor_procesa.php">
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
		</form>
	</body>
</html>