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
				// Validar Nombre Empresa
				if(document.formulario.nom_emp.value.length == 0){
					alert("Tiene que escribir el Nombre de la Empresa")
					document.formulario.nom_emp.focus()
					return 0;
				};

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
		<form method="GET" name="formulario">
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

			<p><?php 
				if($_GET){
					$nom_emp = $_GET['nom_emp'];
					$id_emp = $_GET['id_emp'];
					echo "<table align='center'><tr><td colspan='2' align='center'><b>¿Estás seguro que quieres eliminar los siguientes datos?</b></td></tr>";

					echo "<tr><td align='right'>ID:</td><td align='left'>$id_emp</td></tr>";
					echo "<tr><td align='right' width='50%'>Nombre del Proveedor:</td><td align='left'>$id_emp</td></tr>";

					echo '<tr><td align="center"><input type="button" value="Confirmar" onclick="window.location.replace(\'../body.html\')"></td>';
					echo '<td align="center"><input type="button" value="Cancelar" onclick="window.location.replace(\'tk_eliminar_proveedor.php\')"></td></tr></table>';
				}
			?></p>	
		</form>
	</body>
</html>