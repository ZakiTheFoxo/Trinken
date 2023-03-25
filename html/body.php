<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Body trinken</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
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
                display: inline-block;
                height: 400px;
                width: 200px;
                padding: 10px  10px;
                margin: 5px;
                background: linear-gradient(rgba(255,192,44,1) 0%, rgba(255,27,93,1) 100%);
                border-radius: 16% / 8%;
            }

            h2 {
                font-size: 20px;
                font-weight: bold;
                max-width: 200px;
                overflow: hidden;
            }

            .desc {
                overflow: hidden;
            }

            .informacion {
                position: absolute;
                margin: auto;
                width: 16%;
                padding-top: 15%;
                text-align: center;
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
        <script>
            parent.window.frames["barra"].location.href = 'BarraNav.php';
        </script>
        <div class="Header">
            <font color="white" style="position:relative; left:1%" size="8%">
                <p><b>TRINKEN Be Safe</b></p>
            </font>
        </div>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item">
                <a href="#bebidas"><img class="bd-placeholder-img" width="100%" height="100%" src="../imagenes/Carrusel/Evento1.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg></a>
              </div>
              <div class="carousel-item">
                <a href="#extras"><img class="bd-placeholder-img" width="100%" height="100%" src="../imagenes/Carrusel/Evento2.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg></a>
              </div>
              <div class="carousel-item active">
                <a href="#botanas"><img class="bd-placeholder-img" width="100%" height="100%" src="../imagenes/Carrusel/Evento3.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg></a>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>

        <br>

        <div class="promociones">
            <font color="white" style="position:relative; left:1%" size="5%">
                Promociones
            </font>
            <div class="scroll-container">
            <?php
                include("formularios/conex.php");
                $link = Conectarse();

                $sql = "SELECT * FROM tk_articulos ORDER BY nombre";
                $result = mysqli_query($link,$sql);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
                    echo "<div class='articulo'>";
                    echo "<h2>" . $row["nombre"] . "</h2>";
                    echo "<p>Precio: $" . $row["precio"] . "</p>";
                    echo "<p class='desc'>Descripción: " . $row["descripcion"] . "</p>";
                    echo "<button class='add' onclick='addToCart(" . $row["id"] . ")'>Añadir al carrito" . "</button>";
                    echo "</div>";
                    }
                } 
                else {
                    echo "No hay productos asdladjladj";
                }
                ?>
            </div>
        </div>

        <br>

        <div class="comprado-reciente">
            <font color="white" style="position:relative; left:1%" size="5%">
                Comprado Recientemente
            </font>
            <div class="scroll-container">
                <div class="articulo"></div>
            </div>
        </div>

        <div class="bebidas" id="bebidas">
            <font color="white" style="position:relative; left:1%" size="7%">
                Bebidas
            </font><br>
            <font color="white" style="position:relative; left:1%" size="5%">
                Licores
            </font>
            <div class="scroll-container">
                <?php                
                $sql = "SELECT * FROM tk_articulos WHERE categoria = 'Licores'";
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
            ?>
            </div>

            <font color="white" style="position:relative; left:1%" size="5%">
                Cervezas
            </font>
            <div class="scroll-container">
            <?php
                $sql = "SELECT * FROM tk_articulos WHERE categoria = 'Cervezas'";
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
            ?>
            </div>

            <font color="white" style="position:relative; left:1%" size="5%">
                Mezcladores
            </font>
            <div class="scroll-container">
            <?php
                $sql = "SELECT * FROM tk_articulos WHERE categoria = 'Mezcladores'";
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
            ?>
            </div>  
        </div>

        <div class="botanas" id="botanas">
            <font color="white" style="position:relative; left:1%" size="7%">
                Botanas
            </font><br>
            <font color="white" style="position:relative; left:1%" size="5%">
                Variados
            </font>
            <div class="scroll-container">
            <?php
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
            ?>
            </div>
        </div>

        <div class="extras" id="extras">
            <font color="white" style="position:relative; left:1%" size="7%">
                Extras
            </font><br>
            <font color="white" style="position:relative; left:1%" size="5%">
                Cigarros
            </font>
            <div class="scroll-container">
            <?php
                $sql = "SELECT * FROM tk_articulos WHERE categoria = 'Cigarros'";
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
            ?>
            </div>
        </div>

        <div class="container">
            <div class="fixed-btn">
                <div class="carrito">
                    <a href="formularios/tk_metodo_pago.php"><img src="../imagenes/carrito.png" width="100%" height="100%" title="Carrito">
                    </a>
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