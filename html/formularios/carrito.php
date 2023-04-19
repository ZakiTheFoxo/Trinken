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
			function verificarDatos(){
				if(document.formulario.id.value.length == 0){
					alert("Tiene que escribir el Nombre del Artículo")
					document.formulario.id.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
			}
		</script>
	</head>

	<body>	
		<?php
			include("conex.php");
			$link = Conectarse();
			$cte_id = $_SESSION['autenticado'];
			
			$sql = "SELECT * FROM tk_carrito WHERE cte_id = $cte_id";
			
			$result = mysqli_query($link,$sql);
			
			echo "<div class='table-responsive'><table align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='3' align='center'><b>¿Desea comprar los siguientes Artículos?</b></td></tr>";
			if ($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
					printf("<tr><td>Artículo ID</td><td>Cantidad Pedida</td><td>Precio</td>");
                    echo "<tr><td>" . $row["ato_id"] . "<td>";
                    echo "<td>Precio: $" . $row["cantidad_pedida"] . "</td></td> 	";
                    
					echo "<form action='html/formularios/tk_agregar_al_carrito.php' method='POST'>";
                    //echo "<input type='hidden' name='id' value='".$row['id']."'>";
				}
			} 
			else {
				echo "No hay productos en la base de datos";
			}
			echo "<tr><td colspan='3' align='center'><a href='tk_metodo_pago.php' class='btn btn-primary'>Comprar</a></td></tr>";
			echo "</form>";
			echo "</div>";
            ?>
			</table>
			
			<a href="../../body.php" class="btn btn-secondary">Regresar</a>

			</body>
				
				<footer>
					<table id="footer" width="100%" align="center">
						<tr>
							<td align="left" width="33%">
								<img src="../../Imagenes/trfooter.png" width="40%">
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