<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Inicio Sesion</title>
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

			input[type=button] {
                border-radius: 10px;
                box-shadow: 3px 3px #444;
				border: 0;
			}

			.btn{
                position: relative;
                margin-top: 10px;
                left: 47%;
            }
		</style>

		<script type="text/javascript">
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
						<input type="password" name="contrasena" style="width: 8em">
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