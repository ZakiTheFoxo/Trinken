<?php 
	include 'seguridad.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Carrito</title>
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

			input[type=button], input[type=submit] {
				border-radius: 10px;
				box-shadow: 3px 3px #444;
			}

			input:active[type=button], input[type=submit] {
				box-shadow: 0px 0px;
			}

			input[type=button]{
				border: 0;
			}

			input[type=submit]{
				border: 1;
			}
			
			.btn.btn-secondary{
				position: relative;
				margin-top: 10px;
				left: 47.6%;
            }

			.btn.btn-primary{
                position: relative;
			}
		</style>

		<script type="text/javascript">
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
			function checkSelected(radio){
				opcion = radio.getAttribute("data")
				
				for(var i = 0; i < 2; i++){
					var op = 'radio' + (i + 1);
					document.getElementById(op).style.display = "none";
				}
				
				var op = 'radio' + (opcion);
				document.getElementById(op).style.display = "block";
			}
		</script>
	</head>

	<body>	
		<?php
			include("conex.php");
			$link = Conectarse();
			$cte_id = $_SESSION['autenticado'];
			$sql = "SELECT * FROM tk_articulos join tk_carrito WHERE id = ato_id";
			$total=0;
			$result = mysqli_query($link,$sql);
			
			echo "<div class='table-responsive'><table align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='5' align='center'><b>¿Desea comprar los siguientes Artículos?</b></td></tr>";
			printf("<b><tr><td></td><td><b>Producto</b></td><td><b>Precio</b></td><td><b>Cantidad</b></td><td><b>Subtotal</b></td></tr>");
			if ($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
                    echo "<tr><td><img src='../../imagenes/Productos/".$row["id"].".png' width='35%'></td>";
					echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>$" . $row["precio"] . "</td>";
                    echo "<td>" . $row["cantidad_pedida"] . "</td>";
                    echo "<td>$" . $row["cantidad_pedida"] *$row["precio"]."</td></tr>";
					$total+= $row["cantidad_pedida"] *$row["precio"];
					echo "<form action='tk_metodo_pago.php' method='POST'>";
					//echo "<input type='hidden' name='id' value='".$row['id']."'>";
				}
			} 
			else {
				echo "No hay productos en la base de datos";
			}
			echo "<tr><td align='center' colspan='5'><b>TOTAL: $ ". $total."</b></td></tr>";
			echo "<tr><td colspan='5' align='center'><input type='submit' class='btn btn-primary' value='Comprar'></td></tr>";
			echo "</form>";
			echo "</div>";
            ?>
			</table>

		<form method="GET" name="formulario" action="tk_metodo_pago.php">
			<p><table cellpadding='10px' align="center" width="30%" class="main">
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
										<input type="button" value="Pagar" onclick="window.location.replace('seguimientoPedido.php')">
									</td>
								</tr>
							</table>
						</div>
						<div id="radio2" style="display: none">
							<br>
							<table cellpadding='10px' align="center" width="40%">
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

					echo "<table cellpadding='10px' align='center' class='main'><tr><td colspan='2' align='center'><b>Se almacenaron los siguientes datos:</b></td></tr>";

					echo "<tr><td align='right' width='50%'>Número:</td><td align='left'>$num</td></tr>";
					echo "<tr><td align='right'>Titular:</td><td align='left'>$titu</td></tr>";
					echo "<tr><td align='right'>Fecha de Expiración:</td><td align='left'>$mes</td></tr>";
					echo "<tr><td align='right'>CCV:</td><td align='left'>$ccv</td></tr>";

					echo '<tr><td colspan="2" align="center"><input type="button" value="Pagar" onclick="window.location.replace(\'seguimientoPedido.php\')"></td></tr></table>';
				}
			?></p>
		</form>
		<a href="../body.php" class="btn btn-secondary">Regresar</a>	
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