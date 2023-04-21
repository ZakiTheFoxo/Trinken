<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Formulario Añadir Proveedor</title>
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
				// Validar Nombre Empresa
				if(document.formulario.nom_emp.value.length == 0){
					alert("Tiene que escribir el Nombre de la Empresa")
					document.formulario.nom_emp.focus()
					return 0;
				};

				// Validar Correo
				if(document.formulario.correo.value.length == 0){
					alert("Tiene que escribir el Correo de la Empresa")
					document.formulario.correo.focus()
					return 0;
				};

				// Validar Numero de Celular y longitud
				if(document.formulario.celnum.value.length == 0){
					alert("Tiene que escribir el Número Celular de la Empresa")
					document.formulario.celnum.focus()
					return 0;
				};
				
				if(document.formulario.celnum.value.length != 10){
					alert("El Número Celular de la Empresa debe contener 10 digitos")
					document.formulario.celnum.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="POST" name="formulario" action="tk_anadir_proveedor_procesa.php">
			<p><table cellpadding="10px" align="center" width="40%">
				<tr>
					<td align="right">
						Nombre de la empresa:
					</td>
					<td>
						<input type="text" name="nom_emp" size="30%">
					</td>
				</tr>
				<tr>
					<td align="right">
						Correo:
					</td>
					<td>
						<input type="email" name="correo" size="30%" placeholder="ejemplo@correo.com">
					</td>
				</tr>
				<tr>
					<td align="right">
						Número Celular:
					</td>
					<td>
					<input type="number" name="celnum" style="width: 6em" placeholder="0123456789">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Registrar Proveedor" onclick="verificarDatos()">
					</td>
				</tr>
			</table></p>
		</form>
		<?php
			if ( $_GET ){ 
				if ($_GET['proveedoragregado']==1){
		?> 
					<script>alert("Proveedor añadido exitosamente");</script>
		<?php }} ?>
		<a href="admin.php" class="btn btn-secondary">Regresar</a>
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