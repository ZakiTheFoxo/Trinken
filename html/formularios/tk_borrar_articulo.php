<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Borrar artículo</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<style type="text/css">
			body{
				background-color: black;
				font-family: sans-serif;
			}

			table:not(#footer){
				background-image: url("../../imagenes/barra.png");
				background-repeat: no-repeat;
				border-radius: 5% / 16%;
				padding: 3%;
				background-size: 100% 100%;
			}

			footer{
                background-color: black;
                color: white;
            }

			input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
		</style>

		<script type="text/javascript">
			function verificarDatos(){
				if(document.formulario.id.value.length == 0){
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
		<form method="POST" name="formulario" action="tk_borrar_articulo.php">
			<p><table cellpadding="10px" align="center" width="20%">
				<tr>
					<td align="right">
						ID:
					</td>
					<td>
						<input type="number" name="id" style="width: 3em">
					</td>
				</tr>
				<td colspan="2" align="center">
						<br><input type="button" value="Borrar Artículo" onclick="verificarDatos()">
				</td>
			</table></p>
		</form>

			<p><?php 
				if($_POST){
					$id = $_POST['id'];

					$result = mysqli_query($link, "
						SELECT a.id, a.nombre, a.precio, a.categoria, a.descripcion, a.existencia, p.nombre_de_la_empresa AS Proveedor
						FROM tk_articulos a, tk_proveedores p 
						WHERE a.pvr_id = p.id 
						AND a.id = '$id';
					");

					if(mysqli_num_rows($result) > 0){
						printf('<form method="POST" name="formulario2" action="tk_borrar_articulo_procesa.php">
							<input type="hidden" name="id" value="%d">', $id);

						echo "<table align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='2' align='center'><b>¿Estás seguro que quieres eliminar los siguientes datos?</b></td></tr>";

						printf("<tr><td>ID</td><td>Nombre</td><td>Precio</td><td>Categoria</td><td>Descripcion</td><td>Existencia</td><td>Proveedor</td></tr>");

						while($row = mysqli_fetch_array($result)){
							printf("<tr border><td>%d</td><td>%s</td><td>%d</td><td>%s</td><td>%s</td><td>%d</td><td>%s</td></tr>", 
								$row["id"], $row["nombre"], $row["precio"], $row["categoria"], $row["descripcion"], $row["existencia"], $row["Proveedor"]);
						}

						echo '<tr><td colspan="4" align="center"><input type="submit" value="Confirmar"></td>';
						echo '<td align="center"><input type="button" value="Cancelar" onclick="window.location.replace(\'tk_borrar_articulo.php\')"></td></tr></table></form>';
					}else{
						echo "<table align='center'><tr><td align='center'><b>No se encontró un artículo con ese ID</b></td></tr></table>";
					}
					mysqli_free_result($result);
                    mysqli_close($link);
				}
			?></p>
		<?php
			if ( $_GET ){ 
				if ($_GET['borrararticulo']==1){
		?> 
					<script>alert("Artículo eliminado exitosamente");</script>
		<?php }} ?>
	</body>

	<footer>
        <table id="footer" width="100%" align="center">
            <tr>
                <td align="left" width="33%">
                    <img src="../../Imagenes/trfooter.png" width="40%">
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