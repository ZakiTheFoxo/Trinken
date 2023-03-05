<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Agregar artículo</title>
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
				// Validar nombre del artículo
				if(document.formulario.nom_art.value.length == 0){
					alert("Tiene que escribir el Nombre del Artículo")
					document.formulario.nom_art.focus()
					return 0;
				};

				// Validar descripción
                if(document.formulario.descripcion.value.length == 0){
					alert("Tiene que añadir una Descripción del producto")
					document.formulario.descripcion.focus()
					return 0;
				};

				// Validar precio
				if(document.formulario.precio.value == ""){
					alert("Tiene que introducir un Precio")
					document.formulario.precio.focus()
					return 0;
				}else if(document.formulario.precio.value <= 0){
					alert("El precio no puede ser 0 o menor")
					document.formulario.precio.focus()
					return 0;
				}

				// Validar Categoria
                if(document.formulario.categoria.selectedIndex == 0){
					alert("Tiene que elegir la Categoría")
					document.formulario.categoria.focus()
					return 0;
				};

				// Validar existencia
				if(document.formulario.cantidad.value == 0){
					alert("Tiene que añadir la cantidad de Artículos en Existencia")
					document.formulario.existencia.focus()
					return 0;
				}else if(document.formulario.cantidad.value <= 0){
					alert("La cantidad no puede ser 0 o menor")
					document.formulario.cantidad.focus()
					return 0;
				}

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="GET" name="formulario" action="tk_agregar_articulo.php">
			<p><table align="center" width="50%">
				<tr>
					<td align="right">
						Nombre del Artículo:
					</td>
					<td>
						<input type="text" name="nom_art" size="50%">
					</td>
				</tr>
				<tr>
					<td align="right">
						Descripción:
					</td>
					<td>
						<input type="text" name="descripcion" size="50%">
					</td>
				</tr>
				<tr>
					<td align="right">
						Precio:
					</td>
					<td>
						<input type="number" name="precio" style="width: 3em" placeholder="$">
					</td>
				</tr>
                <tr>
					<td align="right">
						Categoria:
					</td>
					<td>
						<select name="categoria">
							<option selected>Elegir</option>
							<option>Cervezas</option>
							<option>Licores</option>
							<option>Mezcladores</option>
							<option>Cigarros</option>
							<option>Extras</option>
						</select>
					</td>
				</tr>
				<tr>
					<td align="right">
						Cantidad:
					</td>
					<td>
						<input type="number" name="cantidad" style="width: 3em">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Agregar Artículo" onclick="verificarDatos()">
					</td>
				</tr>
			</table></p>

			<p><?php 
				if($_GET){
					$arti = $_GET['nom_art'];
					$desc = $_GET['descripcion'];
					$prec = $_GET['precio'];
					$categ = $_GET['categoria'];
					$cant = $_GET['cantidad'];

					echo "<table align='center'><tr><td colspan='2' align='center'><b>Se almacenaron los siguientes datos:</b></td></tr>";

					echo "<tr><td align='right' width='50%'>Nombre del Artículo:</td><td align='left'>$arti</td></tr>";
					echo "<tr><td align='right'>Descripción:</td><td align='left'>$desc</td></tr>";
					echo "<tr><td align='right' width='50%'>Precio:</td><td align='left'>$$prec</td></tr>";
					echo "<tr><td align='right'>Categoria:</td><td align='left'>$categ</td></tr>";
					echo "<tr><td align='right' width='50%'>Cantidad:</td><td align='left'>$cant</td></tr>";

					echo '<tr><td colspan="2" align="center"><input type="button" value="Volver al Menú" onclick="window.location.replace(\'../body.html\')"></td></tr></table>';
				}
			?></p>	
		</form>
	</body>
</html>