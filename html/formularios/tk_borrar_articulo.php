<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Borrar artículo</title>
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
				// Validar Nombre del artículo
				if(document.formulario.nom_art == 0){
					alert("Tiene que escribir el Nombre del Artículo")
					document.formulario.nom_art.focus()
					return 0;
				};
				if(document.formulario.id == 0){
					alert("Tiene que escribir el Nombre del Artículo")
					document.formulario.id.focus()
					return 0;
				};
				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="GET" name="formulario">
			<p><table align="center" width="50%">
				<tr>
					<td align="right">
						ID:
					</td>
					<td>
						<input type="text" name="id" size="50%">
					</td>
				</tr>
				<tr>
					También puedes eliminarlo mediante su:
				</tr>	
				<tr>
					<td align="right">
						Nombre del Artículo:
					</td>
					<td>
						<input type="text" name="nom_art" size="50%">
					</td>
				</tr>
				<td colspan="2" align="center">
						<br><input type="button" value="Borrar Artículo" onclick="verificarDatos()">
				</td>
			</table></p>

			<p><?php 
				if($_GET){
					$arti = $_GET['nom_art'];
					$id = $_GET['id'];

					echo "<table align='center'><tr><td colspan='2' align='center'><b>¿Estás seguro que quieres eliminar los siguientes datos?</b></td></tr>";

					echo "<tr><td align='right'>ID:</td><td align='left'>$id</td></tr>";
					echo "<tr><td align='right' width='50%'>Nombre del Artículo:</td><td align='left'>$arti</td></tr>";

					echo '<tr><td align="center"><input type="button" value="Confirmar" onclick="window.location.replace(\'../body.html\')"></td>';
					echo '<td align="center"><input type="button" value="Cancelar" onclick="window.location.replace(\'tk_borrar_articulo.php\')"></td></tr></table>';
				}
			?></p>	
		</form>
	</body>
</html>