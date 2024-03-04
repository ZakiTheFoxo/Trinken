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
		<link rel="stylesheet" href="../../css/main.css">

		<script type="text/javascript">
			function crearCuenta(){
				// Validar nombre
				if(document.formulario.nombre.value.length == 0){
					alert("Tiene que escribir su Nombre")
					document.formulario.nombre.focus()
					return 0;
				};

				// Validar apellido
				if(document.formulario.apellido.value.length == 0){
					alert("Tiene que escribir su Apellido")
					document.formulario.nombre.focus()
					return 0;
				};

				// Validar correo
				if(document.formulario.correo.value.length == 0){
					alert("Tiene que escribir su Correo")
					document.formulario.correo.focus()
					return 0;
				};

				// Validar fecha nacimiento			
				if(document.formulario.fecha.value.length == 0){
					alert("Tiene que escoger su fecha de Nacimiento")
					document.formulario.fecha.focus()
					return 0;
				};
				// Validación edad 18 o mayor
				var today = new Date();
				var birthDate = new Date(document.formulario.fecha.value);
				birthDate.setFullYear(birthDate.getFullYear(),birthDate.getMonth(),birthDate.getDate()+1);
				var age = today.getFullYear() - birthDate.getFullYear() ;
				var m = today.getMonth() - birthDate.getMonth();

				if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
					age--;
				}

				if(age<18){
					alert("BARK es solo para mayores de edad")
					document.formulario.fecha.focus()
					return 0;
				}

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

				// Validar Contraseña
				if(document.formulario.contrasena.value.length == 0){
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
		<form method="POST" name="formulario" action="tk_registrar_repartidor_procesa.php">
			<p><table cellpadding='10px' align="center" width="40%">
				<tr>
					<td align="right">
						Nombre(s): <font color="red">*</font>
					</td>

					<td>
						<input type="text" name="nombre" size="30%">
					</td>
				</tr>

				<tr>
					<td align="right">
						Apellidos: <font color="red">*</font>
					</td>

					<td>
						<input type="text" name="apellido" size="30%">
					</td>
				</tr>

				<tr>
					<td align="right">
						Fecha de Nacimiento: <font color="red">*</font>
					</td>

					<td>
						<input type="date" name="fecha" size="30%">
					</td>
				</tr>

				<tr>
					<td align="right">
						Número Celular: <font color="red">*</font>
					</td>
					<td>
						<input type="number" name="celnum" style="width: 6em" placeholder="0123456789">
					</td>
					
				</tr>

				<tr>
					<td align="right">
						Correo: <font color="red">*</font>
					</td>
					<td>
						<input type="email" name="correo" size="30%" placeholder="ejemplo@correo.com">
					</td>
					
				</tr>

				<tr>
					<td align="right">
						Sueldo: <font color="red">*</font>
					</td>
					<td>
						<input type="number" name="sueldo" style="width: 3em" placeholder="$">
					</td>
					
				</tr>

				<tr>
					<td align="right">
						Comision: <font color="red">*</font>
					</td>
					<td>
						<input type="number" name="comision" style="width: 3em" placeholder="%">
					</td>
					
				</tr>

				<tr>
					<td align="right">
						Contraseña: <font color="red">*</font>
					</td>
					<td>
						<input type="password" name="contrasena" size="30%">
					</td>
					
				</tr>

				<tr>
					<td colspan="2" align="center">
						<input type="button" value="Registrar Repartidor" onclick="crearCuenta()">
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