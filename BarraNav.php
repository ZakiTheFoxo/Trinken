<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Barra de navegación trinken</title>	
		<link rel="stylesheet" type="text/css" href="css/main.css" media="screen"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
	</head>


	<body>
		<table class="navbar" cellpadding='10%'>
			<tr>
				<td align="left" width="30%">
					<a class="link" href="body.php" target="cuadroenlaces">
						<img valign="top" halign="left" src="imagenes/trinken_logo.png" width="8%" height="auto" >&nbsp;&nbsp;
						<img valign="top" halign="left" src="imagenes/trinken.png" width="50%" height="auto"></a>
				</td>
				<td align="right" width="70%">
					<?php 
						include 'html/formularios/conex.php';
						$link = Conectarse();

						if(isset($_SESSION['autenticado'])){
							$id = $_SESSION['autenticado'];

								$result = mysqli_query($link, "SELECT nombre, administrador FROM tk_usuarios WHERE id = '$id'");
								$row = mysqli_fetch_array($result);

								// Admin
								if($row['administrador'] == '1'){
									echo '¡Bienvenido, '.$row['nombre'].'!
									<a type="button" id="admin" class="btn link btn-primary" data-toggle="vista-admin">Admin</a>
									<div class="vista-admin" style="display:inline;">
										<div class="btn-group">
											<a id="option" class="btn link btn-secondary" href="html/formularios/tk_articulo.php" type="button" target="cuadroenlaces">Articulos</a>
											<a id="option" class="btn link btn-secondary" href="html/formularios/tk_proveedor.php" type="button" target="cuadroenlaces">Proveedores</a>
											<a id="option" class="btn link btn-secondary" href="html/formularios/tk_repartidor.php" type="button" target="cuadroenlaces">Repartidores</a>
										</div>
									</div>
									<a type="button" class="btn link btn-info" href="html/formularios/tk_editar_perfil.php" target="cuadroenlaces">Editar Perfil</a>
									<a type="button" class="btn link btn-danger" href="html/formularios/cerrar.php" target="cuadroenlaces">Cerrar Sesión</a>';
								
								// Usuario
								}elseif($row['administrador'] == '0'){
									echo '¡Bienvenido, '.$row['nombre'].'!
									<a type="button" class="btn link btn-info" href="html/formularios/tk_editar_perfil.php" target="cuadroenlaces">Editar Perfil</a>
									<a type="button" class="btn link btn-danger" href="html/formularios/cerrar.php" target="cuadroenlaces">Cerrar Sesión</a>';
								}else{
									echo '¡Bienvenido, '.$row['nombre'].'!
									<a type="button" class="btn link btn-info" href="html/formularios/tk_pedidos_repartidor.php" target="cuadroenlaces">Ver Pedidos</a>
									<a type="button" class="btn link btn-info" href="html/formularios/tk_editar_perfil.php" target="cuadroenlaces">Editar Perfil</a>
									<a type="button" class="btn link btn-danger" href="html/formularios/cerrar.php" target="cuadroenlaces">Cerrar Sesión</a>';
								}
						}
						else{
							echo '
							<a href="html/formularios/tk_inicio_sesion.php" target="cuadroenlaces">
								<button id="sesion"type="button" class="btn link btn-primary">Iniciar Sesión</button>
							</a>
							';
						}
					?>

					<script>
						$(".vista-admin").toggle();
						$(document).on("click", "#admin", function() {
							$(".vista-admin").toggle();
						});
						$(document).on("click", "#option", function() {
							$(".vista-admin").toggle();
						});
					</script>
				</td>
			</tr>
		</table>
	</body>
</html>