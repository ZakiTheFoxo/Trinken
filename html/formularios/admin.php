<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Vista de Administrador</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<style type="text/css">
			body{
				background-color: black;
				font-family: sans-serif;
                color: white;
			}

			table:not(#footer){
                margin-top: 10px;
				background-image: url("../../imagenes/barra.png");
				background-repeat: no-repeat;
				border-radius: 8% / 16%;
				padding: 3%;
				background-size: 100% 100%;
			}

            footer{
                background-color: black;
                color: white;
            }

            input[type=button] {
				width: 100%;
                height: auto;
			}
		</style>
	</head>

	<body>
		<table cellpadding="10px" align="center" width="30%">
            <tr>
                <td align="center">
                    <input type="button" value="Agregar un Artículo" onclick="window.location.replace('tk_agregar_articulo.php')">
                </td>
                <td align="center">
                    <input type="button" value="Borrar un Artículo" onclick="window.location.replace('tk_borrar_articulo.php')">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="button" value="Añadir un Proveedor" onclick="window.location.replace('tk_anadir_proveedor.php')">
                </td>
                <td align="center">
                    <input type="button" value="Eliminar un Proveedor" onclick="window.location.replace('tk_eliminar_proveedor.php')">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="button" value="Registrar un Repartidor" onclick="window.location.replace('tk_registrar_repartidor.php')">
                </td>
                <td align="center">
                    <input type="button" value="Eliminar un Repartidor" onclick="window.location.replace('tk_eliminar_repartidor.php')">
                </td>
            </tr>
        </table>
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