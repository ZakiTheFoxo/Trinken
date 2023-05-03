<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Agregar artículo</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/main.css">

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

				// Validar Proveedor
                if(document.formulario.proveedor.selectedIndex == 0){
					alert("Tiene que elegir al Proveedor")
					document.formulario.proveedor.focus()
					return 0;
				};

				// Validar Imagen
                if(document.formulario.imagen.value == ''){
					alert("Tiene que subir una imagen")
					document.formulario.proveedor.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="POST" name="formulario" action="tk_agregar_articulo_procesa.php" enctype="multipart/form-data">
			<p><table cellpadding="10px" align="center" width="50%">
				<tr>
					<td align="right">
						Nombre del Artículo: <font color="red">*</font>
					</td>
					<td>
						<input type="text" name="nom_art" size="50%">
					</td>
				</tr>
				<tr>
					<td align="right">
						Descripción: <font color="red">*</font>
					</td>
					<td>
						<input type="text" name="descripcion" size="50%">
					</td>
				</tr>
				<tr>
					<td align="right">
						Precio: <font color="red">*</font>
					</td>
					<td>
						<input type="number" name="precio" style="width: 3em" placeholder="$">
					</td>
				</tr>
                <tr>
					<td align="right">
						Categoria: <font color="red">*</font>
					</td>
					<td>
						<select name="categoria">
							<option selected>Elegir</option>
							<option>Cervezas</option>
							<option>Cigarros</option>
							<option>Extras</option>
							<option>Licores</option>
							<option>Mezcladores</option>
						</select>
					</td>
				</tr>
				<tr>
					<td align="right">
						Cantidad: <font color="red">*</font>
					</td>
					<td>
						<input type="number" name="cantidad" style="width: 3em">
					</td>
				</tr>
				<tr>
					<td align="right">
						Proveedor: <font color="red">*</font>
					</td>
					<td>
						<select name="proveedor">
							<option SELECTED>Elegir</option>
							<?php 
								$result = mysqli_query($link, "SELECT nombre_de_la_empresa AS nom FROM tk_proveedores;");
								while($row = mysqli_fetch_array($result)){
									echo "<option>".$row['nom']."</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td align="right">
						Imagen:
					</td>
					<td>
						<input type="file" name="imagen" accept="image/png">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Agregar Artículo" onclick="verificarDatos()">
					</td>
				</tr>
			</table></p>
		</form>
		<a href="tk_articulo.php" class="btn btn-secondary">Regresar</a>
	</body>

	<footer>
        <table id="footer" width="100%" align="center">
            <tr>
                <td align="left" width="33%">
                    <img src="../../imagenes/trfooter.png" width="40%">
                </td>

                <td align="center" width="33%">
                    ©2023 Trinken Be Safe
                </td>

                <td align="right" width="33%">
                    <a href="https://www.facebook.com/TrinkenApp/" target="_blank">
                        <img src="../../imagenes/fb.png" width="10%"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://play.google.com/store/apps/details?id=com.trinken.android" target="_blank">
                        <img src="../../imagenes/ps.png" width="10%"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://www.instagram.com/trinkenbesafe/" target="_blank">
                            <img src="../../imagenes/ig.png" width="10%"></a>
                </td>
            </tr>
        </table>
    </footer>
</html>