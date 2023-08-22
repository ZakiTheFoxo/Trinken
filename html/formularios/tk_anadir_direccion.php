<?php 
	include "seguridad.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Añadir Direccion</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/main.css">


		<script type="text/javascript">
			function verificarDatos(){
				// Validar direccion 1
				if(document.formulario.dir_1.value.length == 0){
					alert("Tiene que escribir su Dirección")
					document.formulario.dir_1.focus()
					return 0;
				};

				// Validar estado
                if(document.formulario.estado.value.length == 0){
					alert("Tiene que escribir su Estado")
					document.formulario.estado.focus()
					return 0;
				};

                // Validar ciudad
                if(document.formulario.ciudad.value.length == 0){
					alert("Tiene que escribir su Ciudad")
					document.formulario.ciudad.focus()
					return 0;
				};

                // Validar código postal
                if(document.formulario.c_postal.value.length == 0){
					alert("Tiene que escribir su Código Postal")
					document.formulario.c_postal.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<form method="POST" name="formulario" action="tk_anadir_direccion_procesa.php">
			<p><table cellpadding="10px" align="center" width="50%">
				<tr>
					<td align="right">
						Dirección: <font color="red">*</font>
					</td>
					<td>
						<input type="text" name="dir_1" size="50%" placeholder="Calle, Número de casa, Colonia...">
					</td>
				</tr>
				<tr>
					<td align="right">
						Dirección 2:
					</td>
					<td>
						<input type="text" name="dir_2" size="50%" placeholder="No. Interior, Fraccionamiento... (Opcional)">
					</td>
				</tr>
				<tr>
					<td align="right">
						Estado: <font color="red">*</font>
					</td>
					<td>
						<input type="text" name="estado" size="20%">
					</td>
				</tr>
                <tr>
					<td align="right">
						Ciudad: <font color="red">*</font>
					</td>
					<td>
						<input type="text" name="ciudad" size="20%">
					</td>
				</tr>
                <tr>
					<td align="right">
						Código Postal: <font color="red">*</font>
					</td>
					<td>
						<input type="number" name="c_postal" style="width: 3em">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Añadir Dirección" onclick="verificarDatos()">
					</td>
				</tr>
			</table></p>
		</form>
		<?php
			if ( $_GET ){ 
				if ($_GET['direccionagregada']==1){
		?> 
					<script>alert("Dirección agregada exitosamente");</script>
		<?php }} ?>
		<a href="tk_editar_perfil.php" class="btn btn-secondary">Regresar</a>
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