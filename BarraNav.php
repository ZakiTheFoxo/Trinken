<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Barra de navegación trinken</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">		
		<link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</head>


	<body>
		<table cellpadding='10%' width="100%" height="100%">
			<tr>
				<td align="left" width="33%">
					<a href="body.php" target="cuadroenlaces">
						<img valign="top" halign="left" src="imagenes/trinken_logo.png" width="8%" height="auto" >&nbsp;&nbsp;
						<img valign="top" halign="left" src="imagenes/trinken.png" width="50%" height="auto"></a>
				</td>
				<td align="center" width="33%">
					&nbsp;
				</td>
				<td align="right" width="33%">
					<?php 
						include 'html/formularios/conex.php';
						$link = Conectarse();

						if(isset($_SESSION['autenticado'])){
							$id = $_SESSION['autenticado'];

								$result = mysqli_query($link, "SELECT nombre, administrador FROM tk_usuarios WHERE id = '$id'");
								$row = mysqli_fetch_array($result);

								// Admin
								if($row['administrador'] == '1'){
									echo 'Bienvenido, <a href="html/formularios/sesion.php" target="cuadroenlaces">
										<label id="sesion">'.$row['nombre'].'</label>
									</a>
									<a  type="button" class="btn btn-primary" href="html/formularios/admin.php" target="cuadroenlaces">Vista Admin</a>';

								// Usuario
								}else{
									echo '
									Bienvenido, <a href="html/formularios/sesion.php" target="cuadroenlaces">
										<label id="sesion">'.$row['nombre'].'</label>
									</a>';
								}
						}
						else{
							echo '
							<a href="html/formularios/tk_inicio_sesion.php" target="cuadroenlaces">
								<button id="sesion" type="button" class="btn btn-primary">Iniciar Sesión</button>
							</a>
							';
						}
					?>
				</td>
			</tr>
		</table>
	</body>
</html>