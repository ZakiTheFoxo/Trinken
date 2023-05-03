
<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Editar Proveedor</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/main.css">

		<script type="text/javascript">
			function verificarDatos(){
				// Validar Nombre Empresa
				if(document.formulario.nom_prov.value.length == 0){
					alert("Tiene que escribir el Nombre de la Empresa")
					document.formulario.nom_prov.focus()
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
        <?php 
        	$id = $_POST['id'];
            $result = mysqli_query($link, "SELECT * FROM tk_proveedores WHERE id = $id");
            $row = mysqli_fetch_array($result);
        ?>
    <form method="POST" name="formulario" action="tk_editar_proveedor_procesa.php">
			<p><table cellpadding="10px" align="center" width="50%">
				<tr>
                    <input type="hidden" name="id" value="<?=$id?>">
					<td align="right">
						Nombre de la empresa:
					</td>
					<td>
						<input type="text" name="nom_prov" size="50%" value="<?=$row['nombre_de_la_empresa']?>" required>
					</td>
				</tr>
				<tr>
					<td align="right">
						Correo Electrónico:
					</td>
					<td>
						<input type="email" name="correo" size="30%" placeholder="ejemplo@correo.com" value="<?=$row['correo_electronico']?>" required>
					</td>
				</tr>
                <tr>
                <td align="right">
						Celular:
					</td>
					<td>
						<input type="number" name="celnum" style="width: 6em" placeholder="0123456789" value="<?=$row['celular']?>" required>
					</td>
					
				</tr>		
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Editar Proveedor" onclick="verificarDatos()">
					</td>
				</tr>
			</table></p>
		</form>
		<a href="tk_proveedor.php" class="btn btn-secondary">Regresar</a>
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