<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Body trinken</title>
        <style>
            body{
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
                margin: 0.2%;
                background: linear-gradient(rgba(255,192,44,1) 0%, rgba(255,27,93,1) 100%);
                border-radius: 16% / 8%;
                display: inline-block;
            }
        </style>
	</head>

	<body>
        <font color="white" style="position:relative; left:1%" size="5%">
            Botanas
        </font>
        <div class="scroll-container">
        <?php
            include("formularios/conex.php");
            $link = Conectarse();

            $sql = "SELECT * FROM tk_articulos WHERE categoria = 'Extras'";
            $result = mysqli_query($link,$sql);

            if ($result->num_rows > 0) {
            while($row = $result->fetch_array()) {
                echo "<div class='articulo'>";
                echo "<h2>" . $row["nombre"] . "</h2>";
                echo "<p>Precio: $" . $row["precio"] . "</p>";
                echo "<p>Descripción: $" . $row["descripcion"] . "</p>";
                echo "<button onclick='addToCart(" . $row["id"] . ")'>Añadir al carrito</button>";
                echo "</div>";
                }
            } 
            else {
                echo "No hay productos asdladjladj";
            }
            mysqli_close($link);
        ?>
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