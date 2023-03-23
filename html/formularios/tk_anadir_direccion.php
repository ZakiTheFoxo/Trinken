<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Añadir Direccion</title>
		<style type="text/css">
			body{
				background-color: black;
                font-family: sans-serif;
			}

			table{
				background-image: url("../../imagenes/barra.png");
				background-repeat: no-repeat;
				border-radius: 5% / 16%;
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
				// Validar direccion 1
				if(document.formulario.dir_1.value.length == 0){
					alert("Tiene que escribir su Dirección")
					document.formulario.dir_1.focus()
					return 0;
				};

				// Validar estado
                if(document.formulario.estado.value.length == 0){
					alert("Tiene que escribir su Estado")
					document.formulario.estado.focus()
					return 0;
				};

                // Validar ciudad
                if(document.formulario.ciudad.value.length == 0){
					alert("Tiene que escribir su Ciudad")
					document.formulario.ciudad.focus()
					return 0;
				};

                // Validar código postal
                if(document.formulario.c_postal.value.length == 0){
					alert("Tiene que escribir su Código Postal")
					document.formulario.c_postal.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="POST" name="formulario" action="tk_anadir_direccion_procesa.php">
			<p><table align="center" width="50%">
				<tr>
					<td align="right">
						Dirección:
					</td>
					<td>
						<input type="text" name="dir_1" size="50%" placeholder="Calle, Número de casa, Colonia...">
					</td>
				</tr>
				<tr>
					<td align="right">
						Dirección 2:
					</td>
					<td>
						<input type="text" name="dir_2" size="50%" placeholder="No. Interior, Fraccionamiento... (Opcional)">
					</td>
				</tr>
				<tr>
					<td align="right">
						Estado:
					</td>
					<td>
						<input type="text" name="estado" size="20%">
					</td>
				</tr>
                <tr>
					<td align="right">
						Ciudad:
					</td>
					<td>
						<input type="text" name="ciudad" size="20%">
					</td>
				</tr>
                <tr>
					<td align="right">
						Código Postal:
					</td>
					<td>
						<input type="number" name="c_postal" style="width: 3em">
					</td>
				</tr>
				<tr>
					<td align="right">
						ID Cliente:
					</td>
					<td>
						<input type="text" name="cliente" size="20%">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Añadir Dirección" onclick="verificarDatos()">
					</td>
				</tr>
			</table></p>
		</form>
	</body>
</html>