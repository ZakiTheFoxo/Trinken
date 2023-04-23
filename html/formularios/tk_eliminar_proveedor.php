<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Eliminar Proveedor</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/main.css">

		<script type="text/javascript">
			function verificarDatos(){
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
		<form method="POST" name="formulario" action="tk_eliminar_proveedor.php">
			<p><table cellpadding="10px" align="center" width="30%">
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
		</form>
		<a href="admin.php" class="btn btn-secondary">Regresar</a>

		<p><?php 
			if($_POST){
				$id = $_POST['id_emp'];

				$result = mysqli_query($link, "
					SELECT *
					FROM tk_proveedores
					WHERE id = '$id';
				");

				if(mysqli_num_rows($result) > 0){
					printf('<form method="POST" name="formulario2" action="tk_eliminar_proveedor_procesa.php">
						<input type="hidden" name="id" value="%d">', $id);

					echo "<div class='table-responsive'><table align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='4' align='center'><b>¿Estás seguro que quieres eliminar los siguientes datos?</b></td></tr>";

					printf("<tr><td>ID</td><td>Nombre</td><td>Correo</td><td>Celular</td></tr>");

					while($row = mysqli_fetch_array($result)){
						printf("<tr border><td>%d</td><td>%s</td><td>%s</td><td>%s</td>", 
							$row["id"], $row["nombre_de_la_empresa"], $row["correo_electronico"], $row["celular"]);
					}

					echo '<tr><td colspan="4" align="center"><input type="submit" class="bg-danger text-light" value="Confirmar">&nbsp&nbsp';
					echo '<input type="button" value="Cancelar" onclick="window.location.replace(\'tk_eliminar_proveedor.php\')"></td></tr></table></div></form>';
				}else{
					echo "<table cellpadding='10px' align='center'><tr><td align='center'><b>No se encontró un proveedor con ese ID</b></td></tr></table>";
				}
				mysqli_free_result($result);
				mysqli_close($link);
			}else{
				$result = mysqli_query($link, "
					SELECT *
					FROM tk_proveedores;
				");

				if(mysqli_num_rows($result) > 0){
					echo "<div class='table-responsive'><table align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='4' align='center'><b>Trinken Proveedores</b></td></tr>";

					printf("<tr><td>ID</td><td>Nombre</td><td>Correo</td><td>Celular</td></tr>");

					while($row = mysqli_fetch_array($result)){
						printf("<tr border><td>%d</td><td>%s</td><td>%s</td><td>%s</td>", 
							$row["id"], $row["nombre_de_la_empresa"], $row["correo_electronico"], $row["celular"]);
					}

					echo '</table></div>';
				}else{
					echo "<table align='center'><tr><td align='center'><b>No hay proveedores</b></td></tr></table>";
				}
				mysqli_free_result($result);
				mysqli_close($link);
			}
		?></p>
		<?php
			if ( $_GET ){ 
				if ($_GET['borrarproveedor']==1){
		?> 
					<script>alert("Proveedor eliminado exitosamente");</script>
		<?php }} ?>
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