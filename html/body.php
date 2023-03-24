<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Body trinken</title>
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

            .scroll-container {
                overflow: auto;
                white-space: nowrap;
                margin: 1%;
            }

            .articulo {
                height: 400px;
                width: 200px;
                padding: 0% 0.3%;
                background: linear-gradient(rgba(255,192,44,1) 0%, rgba(255,27,93,1) 100%);
                border-radius: 16% / 8%;
                display: inline-block;
            }

            .informacion {
                position: absolute;
                margin: auto;
                width: 16%;
                padding-top: 15%;
                text-align: center;
            }

            .agregar {
                position: absolute;
                bottom: 0.1%;
                left: 7%;
            }

            .fixed-btn{
                position: fixed;
                bottom: 10%;
                right: 3%;
                background: #bf2a5e;
                width: 5%;
                height: 9.5%;
                text-align: center;
                line-height: normal;
                border-radius: 100%;
                box-shadow: 4px 4px 4px #57182e;
                cursor: pointer;
            }

            .fixed-btn:active{
                box-shadow: 0  0;
            }

            .carrito{
                margin: 0;
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
            }
        </style>
	</head>
	<body>
        <div class="Header">
            <font color="white" style="position:relative; left:1%" size="8%">
                <p><b>TRINKEN Be Safe</b></p>
            </font>
        </div>

        <div class="opciones">
            <table width="80%" align="center">
                <tr>
                    <td align="left">
                        <a href="bebidas.php">
                            <img src="../Imagenes/bebidas.png" width="80%"></a>
                    </td>

                    <td align="center">
                        <a href="botanas.php">
                        <img src="../Imagenes/botanas.png" width="80%"></a>
                    </td>

                    <td align="right">
                        <a href="extras.php">
                        <img src="../Imagenes/extras.png" width="80%"></a>
                    </td>
                </tr>
            </table>
        </div>

        <br>

        <div class="promociones">
            <font color="white" style="position:relative; left:1%" size="5%">
                Promociones
            </font>
            <div class="scroll-container">
                <div class="articulo">
                    <div class="informacion">
                        Cerveza<br>
                        Cerveza Corona<br>
                        4 pack Corona Laton 473ml<br>
                        $30
                    </div>
                    <div class="agregar">
                        <input type="button" value="Agregar">
                    </div>
                </div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
            </div>
        </div>

        <br>

        <div class="comprado-reciente">
            <font color="white" style="position:relative; left:1%" size="5%">
                Comprado Recientemente
            </font>
            <div class="scroll-container">
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
                <div class="articulo"></div>
            </div>
        </div>

        <div class="container">
            <div class="fixed-btn">
                <div class="carrito">
                    <a href="formularios/tk_metodo_pago.php"><img src="../imagenes/carrito.png" width="100%" height="100%" title="Carrito"></a>
                </div>
            </div>
        </div>
    </body>
    
    <footer>
        <table width="100%" align="center">
            <tr>
                <td align="left" width="33%">
                    <img src="../Imagenes/trfooter.png" width="40%">
                </td>

                <td align="center" width="33%">
                    ©2023 Trinken Be Safe
                </td>

                <td align="right" width="33%">
                    <a href="https://www.facebook.com/TrinkenApp/" target="_blank">
                        <img src="../imagenes/fb.png" width="10%"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://play.google.com/store/apps/details?id=com.trinken.android" target="_blank">
                        <img src="../imagenes/ps.png" width="10%"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://www.instagram.com/trinkenbesafe/" target="_blank">
                            <img src="../imagenes/ig.png" width="10%"></a>
                </td>
            </tr>
        </table>
    </footer>
</html>