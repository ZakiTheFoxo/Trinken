<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Barra de navegación trinken</title>
		
		<style>
			body {
				background-image: url("../imagenes/barra.png");
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: 100% 100%;
				font-family: sans-serif;
			}

			a:link { text-decoration: none; }
			a:visited { text-decoration: none; }
			a:hover { text-decoration: none; }
			a:active { text-decoration: none; }

			input[type=search] {
				border-radius: 3% / 60%;
			}
		</style>
	</head>


	<body>
		<table cellpadding='1%' width="100%" height="100%">
			<tr>
				<td align="left" width="33%">
					<a href="body.php" target="cuadroenlaces">
						<img valign="top" halign="left" src="../imagenes/trinken_logo.png" width="8%" height="auto" >&nbsp;&nbsp;
						<img valign="top" halign="left" src="../imagenes/trinken.png" width="50%" height="auto"></a>
				</td>
				<td align="center" width="33%">
					<div class="search-bar">
						<input type="search" name="busqueda" size="40%">
						<input type="submit" name="buscar" value="Buscar" size="75%">
					</div>
				</td>
				<td align="right" width="33%">
					<?php 
						include 'formularios/conex.php';
						$link = Conectarse();

						if(isset($_SESSION['autenticado'])){
							$id = $_SESSION['autenticado'];

								$result = mysqli_query($link, "SELECT nombre, administrador FROM tk_usuarios WHERE id = '$id'");
								$row = mysqli_fetch_array($result);

								// Admin
								if($row['administrador'] == '1'){
									echo '<a href="formularios/admin.php" target="cuadroenlaces">Vista Admin</a>
									<a href="formularios/sesion.php" target="cuadroenlaces">
										<img valign="top" halign="left" src="../imagenes/user.png" width="7%" height="auto">&nbsp;
										<label id="sesion">Bienvenido, '.$row['nombre'].'</label>
									</a>';

								// Usuario
								}else{
									echo '
									<a href="formularios/sesion.php" target="cuadroenlaces">
										<img valign="top" halign="left" src="../imagenes/user.png" width="7%" height="auto">&nbsp;
										<label id="sesion">Bienvenido, '.$row['nombre'].'</label>
									</a>';
								}
						}
						else{
							echo '
							<a href="formularios/tk_inicio_sesion.php" target="cuadroenlaces">
								<img valign="top" halign="left" src="../imagenes/user.png" width="7%" height="auto">&nbsp;
								<label id="sesion">Iniciar Sesión</label>
							</a>
							';
						}
					?>
				</td>
			</tr>
		</table>
	</body>
</html>