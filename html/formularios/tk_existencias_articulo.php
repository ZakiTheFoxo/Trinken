<?php 
	include 'seguridad_admin.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Carrito</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
        <link rel="stylesheet" href="../../css/main.css">

        <style type="text/css">
			input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: button;
                margin: 1;
            }
		</style>

		<script type="text/javascript">
            function verificarDatos1(){
                // Validar existencia
				if(document.form1.agregar.value == 0){
					alert("Debe ingresar un número")
					document.form1.agregar.focus()
					return 0;
				}else if(document.form1.agregar.value <= 0){
					alert("La cantidad no puede ser 0 o menor")
					document.form1.agregar.focus()
					return 0;
				}

				// Enviar formulario				
				document.form1.submit();
            }

            function verificarDatos2(max){
                // Validar existencia
				if(document.form2.quitar.value == 0){
					alert("Debe ingresar un número")
					document.form2.quitar.focus()
					return 0;
				}else if(document.form2.quitar.value <= 0){
					alert("La cantidad no puede ser 0 o menor")
					document.form2.quitar.focus()
					return 0;
				}else if(document.form2.quitar.value > max){
					alert("La cantidad no puede mayor que las existencias actuales")
					document.form2.quitar.focus()
					return 0;
				}

                // Validar desc
				if(document.form2.desc.value.length == 0){
					alert("Debe escribir la razón de la baja de existencias")
					document.form2.desc.focus()
					return 0;
				}

				// Enviar formulario				
				document.form2.submit();
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
        <p><table cellpadding='10px' cellspacing="10px" align="center" width="40%" class="main">
            <tr>
                <td align="center" colspan="2"><b>Existencias</b></td>
            </tr>
            <tr>
                <td align="center">
                    <input type="radio" name="exis" value="agregar" data="1" onclick="javascript:checkSelected(this)">Agregar
                </td>
                <td align="center">
                    <input type="radio" name="exis" value="quitar" data="2" onclick="checkSelected(this)">Quitar
                </td>
            </tr>
            <tr>
                <td width="100%" align="center" colspan="2">
                <form method="POST" name="form1" action="tk_existencias_articulo_procesa.php">
                    <input type="hidden" name="tipo" value="1">
                    <input type="hidden" name="id" value="<?=$_POST['id']?>">
                    <div id="radio1" style="display: none">
                    <p>
                        <table class='metodo'>
                            <tr>
                                <td align="right">
                                    Agregar Existencias:
                                </td>
            
                                <td>
                                    <input type="number" name="agregar" style="width:3em">
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2"><br>
                                    <input type="button" value="Agregar" onclick="verificarDatos1()">
                                </td>
                            </tr>
                        </table>
                    </p>
                    </div>
                </form>
                <form method="POST" name="form2" action="tk_existencias_articulo_procesa.php">
                    <input type="hidden" name="tipo" value="2">
                    <input type="hidden" name="id" value="<?=$_POST['id']?>">
                    <div id="radio2" style="display: none">
                        <p>
                        <table class='metodo'>
                            <tr>
                                <td align="right">
                                    Quitar Existencias:
                                </td>
            
                                <td>
                                    <input type="number" name="quitar" style="width:3em">
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    Descripción:
                                </td>
            
                                <td>
                                    <input type="text" name="desc" size="50px">
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2"><br>
                                    <input type="button" value="Quitar" onclick="verificarDatos2(<?=$_POST['exis']?>)">
                                </td>
                            </tr>
                        </table>
                        </p>
                    </div>
                </form>
                </td>
            </tr>
        </table></p>
		<a href="tk_articulo.php" class="btn btn-secondary">Regresar</a>	
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