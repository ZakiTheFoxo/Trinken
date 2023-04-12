<?php 
	include "seguridad.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Trinken</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <style>
            html, body{
                max-width: 100%;
                overflow-x: hidden;
                background-color: black;
                font-family: sans-serif;
            }

            footer{
                background-color: black;
                color: white;
            }

			table[class=pedido]{
                margin-top: 10px;
                background: linear-gradient(rgba(255,192,44,1) 0%, rgba(255,27,93,1) 100%);
				background-repeat: no-repeat;
				border-radius: 20px / 20px;
				padding: 3%;
				background-size: 100% 100%;
			}

            input[type=button] {
                border-radius: 10px;
                box-shadow: 3px 3px #444;
				border: 0;
			}

            .center{
                position: relative;
                margin-top: 10px;
                left: 47%;
            }

            .btn{
                position: relative;
                margin-top: 10px;
                left: 47%;
            }
        </style>
	</head>
	<body>
        <table cellpadding="10px" align="center" class="pedido">
            <tr>
                <td align="center">
                    <input type="button" value="Agregar una dirección" onclick="window.location.replace('tk_anadir_direccion.php')">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="button" value="Cerrar Sesión" onclick="window.location.replace('cerrar.php')">
                </td>
            </tr>
        </table>
        <a href="../../body.php" class="btn btn-secondary">Regresar</a>
    </body>
    
    <footer>
        <table width="100%" align="center">
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