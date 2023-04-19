<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Registrar Repartidor</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<style type="text/css">
			body{
				background-color: black;
				font-family: sans-serif;
			}

			table:not(#footer){
				background: linear-gradient(rgba(255,192,44,1) 0%, rgba(255,27,93,1) 100%);
				background-repeat: no-repeat;
				border-radius: 20px / 20px;
				padding: 3%;
				background-size: 100% 100%;
			}

            footer{
                background-color: black;
                color: white;
                position:fixed;
                left:0px;
                bottom:0px;
            }

			input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

			input[type=button], input[type=submit] {
                border-radius: 10px;
                box-shadow: 3px 3px #444;
            }

            input:active[type=button], input[type=submit] {
                box-shadow: 0px 0px;
            }

			input[type=button]{
				border: 0;
			}

			input[type=submit]{
				border: 1;
			}

			.btn{
                position: relative;
                margin-top: 10px;
                left: 47%;
            }
		</style>

		<script type="text/javascript">
			function verificarDatos(){
				// Validar Numero de Celular
				if(document.formulario.id.value.length == 0){
					alert("Tiene que escribir el ID del repartidor")
					document.formulario.id.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="POST" name="formulario" action="tk_eliminar_repartidor.php">
		<p><table cellpadding='10px' align="center" width="30%">
			<tr>
				<td align="right">
					ID del repartidor:
				</td>
				<td>
				<input type="text" name="id" style="width: 6em">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<br><input type="button" value="Eliminar Repartidor" onclick="verificarDatos()">
				</td>
			</tr>
		</table></p>
		</form>
		<a href="admin.php" class="btn btn-secondary">Regresar</a>

		<p><?php 
			if($_POST){
				$id = $_POST['id'];

				$result = mysqli_query($link, "
					SELECT *
					FROM tk_repartidores
					WHERE id = '$id';
				");

				if(mysqli_num_rows($result) > 0){
					printf('<form method="POST" name="formulario2" action="tk_eliminar_repartidor_procesa.php">
						<input type="hidden" name="id" value="%d">', $id);

					echo "<div class='table-responsive'><table cellpadding='10px' align='center' cellspacing='20px'><tr><td colspan='7' align='center'><b>¿Estás seguro que quieres eliminar los siguientes datos?</b></td></tr>";

					printf("<tr><td>ID</td><td>Nombre</td><td>Apellidos</td><td>Correo</td><td>Celular</td><td>Sueldo</td><td>Comision</td></tr>");

					while($row = mysqli_fetch_array($result)){
						printf("<tr border><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>$%0.2f</td><td>%0.2f</td>", 
							$row["id"], $row["nombre"], $row["apellidos"], $row["correo_electronico"], $row["celular"], $row["sueldo"], $row["comision"]);
					}

					echo '<tr><td colspan="7" align="center"><input type="submit" class="bg-danger text-light" value="Confirmar">&nbsp;&nbsp;';
					echo '<input type="button" value="Cancelar" onclick="window.location.replace(\'tk_eliminar_repartidor.php\')"></td></tr></table></div></form>';
				}else{
					echo "<table cellpadding='10px' align='center'><tr><td align='center'><b>No se encontró un proveedor con ese ID</b></td></tr></table>";
				}
				mysqli_free_result($result);
				mysqli_close($link);
			}else{
				$result = mysqli_query($link, "
					SELECT *
					FROM tk_repartidores;
				");

				if(mysqli_num_rows($result) > 0){
					echo "<div class='table-responsive'><table align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='7' align='center'><b>Trinken Repartidores</b></td></tr>";

					printf("<tr><td>ID</td><td>Nombre</td><td>Apellidos</td><td>Correo</td><td>Celular</td><td>Sueldo</td><td>Comision</td></tr>");

					while($row = mysqli_fetch_array($result)){
						printf("<tr border><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>$%0.2f</td><td>%0.2f</td>", 
							$row["id"], $row["nombre"], $row["apellidos"], $row["correo_electronico"], $row["celular"], $row["sueldo"], $row["comision"]);
					}

					echo '</table></div>';
				}else{
					echo "<table align='center'><tr><td align='center'><b>No hay repartidores</b></td></tr></table>";
				}
				mysqli_free_result($result);
				mysqli_close($link);
			}
		?></p>
		<?php
			if ( $_GET ){ 
				if ($_GET['borrarrepartidor']==1){
		?> 
					<script>alert("Repartidor eliminado exitosamente");</script>
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