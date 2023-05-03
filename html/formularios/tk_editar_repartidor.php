
<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Borrar artículo</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/main.css">

		<script type="text/javascript">
			function crearCuenta(){
				// Validar nombre
				if(document.formulario.nom_rep.value.length == 0){
					alert("Tiene que escribir su Nombre")
					document.formulario.nom_rep.focus()
					return 0;
				};

				// Validar apellido
				if(document.formulario.apellidos.value.length == 0){
					alert("Tiene que escribir su Apellido")
					document.formulario.apellidos.focus()
					return 0;
				};

				// Validar correo
				if(document.formulario.correo.value.length == 0){
					alert("Tiene que escribir su Correo")
					document.formulario.correo.focus()
					return 0;
				};

				// Validar número de celular y longitud
				if(document.formulario.celnum.value.length == 0){
					alert("Tiene que escribir su Número de Celular")
					document.formulario.celnum.focus()
					return 0;
				};
				if(document.formulario.celnum.value.length != 10){
					alert("El Número Celular debe contener 10 digitos")
					document.formulario.celnum.focus()
					return 0;
				};

				// Validar Sueldo
				if(document.formulario.sueldo.value.length == 0){
					alert("Tiene que ingresar su Sueldo")
					document.formulario.sueldo.focus()
					return 0;
				};

				// Validar Comision
				if(document.formulario.comision.value.length == 0){
					alert("Tiene que ingresar su Comision")
					document.formulario.comision.focus()
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
            $result = mysqli_query($link, "SELECT * FROM tk_repartidores WHERE id = $id");
            $row = mysqli_fetch_array($result);
        ?>
    <form method="POST" name="formulario" action="tk_editar_repartidor_procesa.php" enctype="multipart/form-data">
			<p><table cellpadding="10px" align="center" width="50%">
				<tr>
                    <input type="hidden" name="id" value="<?=$id?>">
					<td align="right">
						Nombre del Repartidor: <font color="red">*</font>
					</td>
					<td>
						<input type="text" name="nom_rep" size="50%" value="<?=$row['nombre']?>" required>
					</td>
				</tr>
				<tr>
					<td align="right">
						Apellidos: <font color="red">*</font>
					</td>
					<td>
						<input type="text" name="apellidos" size="50%" value="<?=$row['apellidos']?>" required>
					</td>
				</tr>
				<tr>
					<td align="right">
						Correo Electrónico: <font color="red">*</font>
					</td>
					<td>
						<input type="email" name="correo" size="30%" placeholder="ejemplo@correo.com" value="<?=$row['correo_electronico']?>" required>
					</td>
				</tr>
                <tr>
                <td align="right">
						Celular: <font color="red">*</font>
					</td>
					<td>
						<input type="number" name="celnum" style="width: 6em" placeholder="0123456789" value="<?=$row['celular']?>" required>
					</td>
					
				</tr>
				<tr>
					<td align="right">
						Sueldo: <font color="red">*</font>
					</td>
					<td>
						<input type="number" name="sueldo" style="width: 3em" value="<?=$row['sueldo']?>" required>
					</td>
				</tr>
				<tr>

                <td align="right">
						Comisión: <font color="red">*</font>
					</td>
					<td>
						<input type="number" name="comision" style="width: 3em" value="<?=$row['comision']?>" required>
					</td>
					
				</tr>
		
				<tr>
					<td colspan="2" align="center">
						<br><input type="button" value="Editar Repartidor" onclick="verificarDatos()">
					</td>
				</tr>
			</table></p>
		</form>
		<a href="tk_repartidor.php" class="btn btn-secondary">Regresar</a>
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