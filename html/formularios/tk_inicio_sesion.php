<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Inicio Sesion</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

		<link rel="stylesheet" href="../../css/main.css">

		<script type="text/javascript">
			
			function showPass() {
				const togglePassword = document.getElementById('togglePassword');
				const password = document.getElementById('id_password');
				// toggle the type attribute
				const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
				password.setAttribute('type', type);
				// toggle the eye slash icon
				togglePassword.classList.toggle('fa-eye-slash');
			}

			function verificarDatos(){
				// Validar usuario
				if(document.formulario.usuario.value.length == 0){
					alert("Tiene que escribir su Usuario")
					document.formulario.usuario.focus()
					return 0;
				};

				// Validar Contraseña
				if(document.formulario.contrasena.value.length == 0){
					alert("Tiene que escribir su Contraseña")
					document.formulario.contrasena.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="POST" name="formulario" action="control.php">
			<p><table cellpadding='10px' align="center" width="30%">
				<tr>
					<td align="right">
						Usuario (No. Celular):
					</td>
					<td>
						<input type="number" name="usuario" style="width: 8em" placeholder="+5210123456789">
					</td>
				</tr>
				<tr>
					<td align="right">
						Constraseña:
					</td>
					<td>
						<input type="password" name="contrasena" style="width: 8em" id="id_password">
						<i class="far fa-eye" id="togglePassword" onclick="showPass()"></i>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" >
						<?php
							if ( $_GET ){ 
								if ($_GET['errorusuario']==1){
						?> 
									<Font color="red">
										<b>Datos incorrectos</b>
									</Font>
						<?php }} ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Iniciar Sesión" onclick="verificarDatos()"><br><br>
						<input type="button" value="Registrarse" onclick="window.location.replace('tk_registrar_cuenta.php')">
					</td>
				</tr>
			</table></p>			
		</form>
		<a href="../../body.php" class="btn btn-secondary">Regresar</a>
	</body>

	<footer>
        <table id="footer" width="100%" align="center">
            <tr>
                <td align="left" width="33%">
                    <img src="../../imagenes/trfooter.png" width="40%">
                </td>

                <td align="center" width="33%">
                    ©2023 BARK Be Safe
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