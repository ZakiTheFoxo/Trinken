<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Inicio Sesion</title>
		<style type="text/css">
			body{
				background-color: black;
				font-family: sans-serif;
			}

			table[class=main]{
				background-image: url("../../imagenes/barra.png");
				background-repeat: no-repeat;
				border-radius: 5% / 16%;
				padding: 3%;
				background-size: 100% 100%;
			}
		</style>

		<script>
			function checkSelected(radio){
				opcion = radio.getAttribute("data")
				
				for(var i = 0; i < 2; i++){
					var op = 'radio' + (i + 1);
					document.getElementById(op).style.display = "none";
				}
				
				var op = 'radio' + (opcion);
				document.getElementById(op).style.display = "block";
			}

			function validarTarjeta(){
				// Validar número
				if(document.formulario.num.value.length < 16){
					alert("Tiene que escribir un número de tarjeta válido")
					document.formulario.num.focus()
					return 0;
				};
	
				// Validar nombre
				if(document.formulario.titular.value.length == 0){
					alert("Tiene que escribir un nombre")
					document.formulario.titular.focus()
					return 0;
				};
	
				// Validar fecha de expiración
				if(document.formulario.mes.value.length == 0){
					alert("Tiene que ingresar una fecha de expiración válida")
					document.formulario.mes.focus()
					return 0;
				};
	
				// Validar CCV
				if(document.formulario.ccv.value.length == 0){
					alert("Tiene que escribir un CCV válido")
					document.formulario.ccv.focus()
					return 0;
				};
	
				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>
		<p>
			<table align="center" width="30%" class="main">
				<tr>
					<td align="center">
						<p><b>CARRITO</b></p>
					</td>
				</tr>
				<tr>
					<td>
						Cerveza Corona	Cantidad: 1 	Subtotal: $30
						Total: $30
					</td>
				</tr>
			</table>
		</p>
		<form method="GET" name="formulario" action="tk_metodo_pago.php">
			<p><table align="center" width="30%" class="main">
				<tr>
					<td>
						Método de Pago:
					</td>
					<td>
						<input type="radio" name="tipo_pago" value="efectivo" data="1" onclick="javascript:checkSelected(this)">En efectivo
					</td>
                    <td>
                        <input type="radio" name="tipo_pago" value="tarjeta" data="2" onclick="checkSelected(this)">En tarjeta
                    </td>
				</tr>
				<tr>
					<td width="100%" align="center" colspan="3">
						<div id="radio1" style="display: none">
							<table>
								<tr>
									<td align="center">
										<br>En caso de ser efectivo, trate de llevar el precio exacto o no pagar con una denominación tan alta
									</td>
								</tr>
								<tr>
									<td align="center">
										<input type="button" value="Pagar" onclick="window.location.replace('../seguimientoPedido.html')">
									</td>
								</tr>
							</table>
						</div>
						<div id="radio2" style="display: none">
							<br>
							<table align="center" width="40%">
								<tr>
									<td align="right">
										Número de tarjeta:
									</td>
				
									<td>
										<input type="text" name="num" size="30%" minlength="16" maxlength="19">
									</td>
								</tr>
				
								<tr>
									<td align="right">
										Nombre del titular:
									</td>
				
									<td>
										<input type="text" name="titular" size="30%">
									</td>
								</tr>
				
								<tr>
									
									<td align="right">
										Fecha de Expiración:
									</td>
									<td>
										<input type="month" name="mes" size="30%">
									</td>
									
								</tr>
				
								<tr>
									<td align="right">
										CCV:
									</td>
									<td>
										<input type="text" name="ccv" size="30%" maxlength="3">
									</td>
									
								</tr>
				
								<tr>
									<td colspan="2" align="center">
										<input type="button" value="Pagar" onclick="validarTarjeta()">
									</td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table></p>

			<p><?php 
				if($_GET){
					$num = $_GET['num'];
					$titu = $_GET['titular'];
					$mes = $_GET['mes'];
					$ccv = $_GET['ccv'];

					echo "<table align='center' class='main'><tr><td colspan='2' align='center'><b>Se almacenaron los siguientes datos:</b></td></tr>";

					echo "<tr><td align='right' width='50%'>Número:</td><td align='left'>$num</td></tr>";
					echo "<tr><td align='right'>Titular:</td><td align='left'>$titu</td></tr>";
					echo "<tr><td align='right'>Fecha de Expiración:</td><td align='left'>$mes</td></tr>";
					echo "<tr><td align='right'>CCV:</td><td align='left'>$ccv</td></tr>";

					echo '<tr><td colspan="2" align="center"><input type="button" value="Pagar" onclick="window.location.replace(\'../seguimientoPedido.html\')"></td></tr></table>';
				}
			?></p>
		</form>
	</body>
</html>