<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Verificar INE</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/main.css">

        <script>
            function verificarDatos(){
                // Validar Imagen
                if(document.formulario.imagen.value == ''){
					alert("Tiene que subir una imagen")
					document.formulario.imagen.focus()
					return 0;
				};

				// Enviar formulario				
				document.formulario.submit();
            }
        </script>
	</head>

	<body>
		<p>
		<form method="POST" name="formulario" action="tk_validar_nuevamente_procesa.php" enctype="multipart/form-data">
            <div class='table-responsive'>
                <input type="hidden" name="id" value="<?=$_SESSION['autenticado']?>">
                <table align='center' cellpadding='10px' cellspacing='20px'>
                    <tr align='center'>
                        <td colspan="2">Sus credenciales no han coincidido o no se apreciaban corectamente, <br>por favor, suba una identificación válida y legible</td>
                    </tr>
                    <tr>
                        <td align="right">
                            Fotografía INE: <font color="red">*</font>
                        </td>
                        <td>
                            <input type="file" name="imagen" accept="image/*">
                        </td>
                    </tr>
                    <tr>
					<td colspan="2" align="center">
						<input type="button" value="Subir Nuevamente" onclick="verificarDatos()">
					</td>
				</tr>
                </table>
            </div>
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