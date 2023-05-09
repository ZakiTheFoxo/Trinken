<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Body trinken</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
	</head>
	<body>
        <script>
            parent.window.frames["barra"].location.href = 'BarraNav.php';
        </script>
        <div class="header">
            <font color="white" style="position:relative; left:1%" size="8%">
                <p>TRINKEN Be Safe</p>
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
                <a href="#bebidas"><img class="bd-placeholder-img" width="100%" height="100%" src="imagenes/Carrusel/Evento1.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg></a>
              </div>
              <div class="carousel-item">
                <a href="#cigarros"><img class="bd-placeholder-img" width="100%" height="100%" src="imagenes/Carrusel/Evento2.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg></a>
              </div>
              <div class="carousel-item active">
                <a href="#extras"><img class="bd-placeholder-img" width="100%" height="100%" src="imagenes/Carrusel/Evento3.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg></a>
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
        
        <!--Vista Previa Administrador / Repartidor-->
        <?php
            include("html/formularios/conex.php");
            $link = Conectarse();
            $id = $_SESSION['autenticado'];
            $result1 = mysqli_query($link, "SELECT nombre, administrador FROM tk_usuarios WHERE id = '$id'");
            $row1 = mysqli_fetch_array($result1);
            if($row1['administrador'] > 0){ ?><?php // Admin y Repartidor
                echo '<div class="promociones">
                <font color="white" style="position:relative; left:1%" size="6%">
                    VISTA PREVIA DE TODOS LOS ARTICULOS
                </font>
                </div>';               
            }else {
                echo '<div class="promociones">
                <font color="white" style="position:relative; left:1%" size="5%">
                    Todos los Artículos
                </font>
                </div>';
            }
        ?>
            <div class="scroll-container">
            <?php
                $sql = "SELECT * FROM tk_articulos ORDER BY nombre";
                $result = mysqli_query($link,$sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
                    echo "<div class='articulo'>";
                    echo "<div class='img-articulo'><img src='imagenes/Productos/".$row["imagen"]."' height='100%'></div>";
                    echo "<div class='info-articulo'><h2>" . $row["nombre"] . "</h2>";
                    echo "<p>Precio: $" . $row["precio"] . "</p>";
                    echo "<p class='desc'>Descripción: " . $row["descripcion"] . "</p></div>";
                        $result1 = mysqli_query($link, "SELECT nombre, administrador FROM tk_usuarios WHERE id = '$id'");
						$row1 = mysqli_fetch_array($result1);
						if($row1['administrador'] > 0){ ?><?php // Usuario
                            echo "<p class='agregar'><b>VISTA PREVIA</b></p>";                   
                            echo "</div>";                            
                        }else {
                            echo "<form action='html/formularios/tk_agregar_al_carrito.php' method='POST'>";
                            echo "<input type='hidden' name='id' value='".$row['id']."'>";
                            echo "<button class='add agregar' value='Agregar al carrito'>Agregar al carrito</button>";
                            echo "</form>";                   
                            echo "</div>";
                        }
                    }
                } 
                else {
                    echo "No hay productos en la base de datos";
                }
            ?>
            </div>
        </div>
        <br>

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
                        echo "<div class='img-articulo'><img src='imagenes/Productos/".$row["imagen"]."' height='100%'></div>";
                        echo "<div class='info-articulo'><h2>" . $row["nombre"] . "</h2>";
                        echo "<p>Precio: $" . $row["precio"] . "</p>";
                        echo "<p class='desc'>Descripción: " . $row["descripcion"] . "</p></div>";
                        $result1 = mysqli_query($link, "SELECT nombre, administrador FROM tk_usuarios WHERE id = '$id'");
                        $row1 = mysqli_fetch_array($result1);
                        if($row1['administrador'] > 0){ ?><?php // Usuario
                            echo "<p class='agregar'><b>VISTA PREVIA</b></p>";                   
                            echo "</div>";                            
                        }else {
                            echo "<form action='html/formularios/tk_agregar_al_carrito.php' method='POST'>";
                            echo "<input type='hidden' name='id' value='".$row['id']."'>";
                            echo "<button class='add agregar' value='Agregar al carrito'>Agregar al carrito</button>";
                            echo "</form>";                   
                            echo "</div>";
                        }
                    }
                }

                else {
                    echo "No hay productos en la base de datos";
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
                        echo "<div class='img-articulo'><img src='imagenes/Productos/".$row["imagen"]."' height='100%'></div>";
                        echo "<div class='info-articulo'><h2>" . $row["nombre"] . "</h2>";
                        echo "<p>Precio: $" . $row["precio"] . "</p>";
                        echo "<p class='desc'>Descripción: " . $row["descripcion"] . "</p></div>";
                            $result1 = mysqli_query($link, "SELECT nombre, administrador FROM tk_usuarios WHERE id = '$id'");
                            $row1 = mysqli_fetch_array($result1);
                            if($row1['administrador'] > 0){ ?><?php // Usuario
                                echo "<p class='agregar'><b>VISTA PREVIA</b></p>";                   
                                echo "</div>";                            
                            }else {
                                echo "<form action='html/formularios/tk_agregar_al_carrito.php' method='POST'>";
                                echo "<input type='hidden' name='id' value='".$row['id']."'>";
                                echo "<button class='add agregar' value='Agregar al carrito'>Agregar al carrito</button>";
                                echo "</form>";                   
                                echo "</div>";
                            }
                        }
                } 
     
                else {
                    echo "No hay productos en la base de datos";
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
                        echo "<div class='img-articulo'><img src='imagenes/Productos/".$row["imagen"]."' height='100%'></div>";
                        echo "<div class='info-articulo'><h2>" . $row["nombre"] . "</h2>";
                        echo "<p>Precio: $" . $row["precio"] . "</p>";
                        echo "<p class='desc'>Descripción: " . $row["descripcion"] . "</p></div>";
                        $result1 = mysqli_query($link, "SELECT nombre, administrador FROM tk_usuarios WHERE id = '$id'");
                        $row1 = mysqli_fetch_array($result1);
                        if($row1['administrador'] > 0){ ?><?php // Usuario
                            echo "<p class='agregar'><b>VISTA PREVIA</b></p>";                   
                            echo "</div>";                            
                        }else {
                            echo "<form action='html/formularios/tk_agregar_al_carrito.php' method='POST'>";
                            echo "<input type='hidden' name='id' value='".$row['id']."'>";
                            echo "<button class='add agregar' value='Agregar al carrito'>Agregar al carrito</button>";
                            echo "</form>";                   
                            echo "</div>";
                        }
                    }
                }

                else {
                    echo "No hay productos en la base de datos";
                }
            ?>
            </div>  
        </div>

        <br>

        <div class="cigarros" id="cigarros">
            <font color="white" style="position:relative; left:1%" size="7%">
                Cigarros
            </font><br>
            <div class="scroll-container">            
            <?php
                $sql = "SELECT * FROM tk_articulos WHERE categoria = 'Cigarros'";
                $result = mysqli_query($link,$sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_array()) {
                        echo "<div class='articulo'>";
                        echo "<div class='img-articulo'><img src='imagenes/Productos/".$row["imagen"]."' height='100%'></div>";
                        echo "<div class='info-articulo'><h2>" . $row["nombre"] . "</h2>";
                        echo "<p>Precio: $" . $row["precio"] . "</p>";
                        echo "<p class='desc'>Descripción: " . $row["descripcion"] . "</p></div>";
                        $result1 = mysqli_query($link, "SELECT nombre, administrador FROM tk_usuarios WHERE id = '$id'");
                        $row1 = mysqli_fetch_array($result1);
                        if($row1['administrador'] > 0){ ?><?php // Usuario
                            echo "<p class='agregar'><b>VISTA PREVIA</b></p>";                   
                            echo "</div>";                            
                        }else {
                            echo "<form action='html/formularios/tk_agregar_al_carrito.php' method='POST'>";
                            echo "<input type='hidden' name='id' value='".$row['id']."'>";
                            echo "<button class='add agregar' value='Agregar al carrito'>Agregar al carrito</button>";
                            echo "</form>";                   
                            echo "</div>";
                        }
                    }
                } 
    
                else {
                    echo "No hay productos en la base de datos";
                }
            ?>
            </div>
        </div>

        <br>

        <div class="extras" id="extras">
            <font color="white" style="position:relative; left:1%" size="7%">
                Extras
            </font><br>
            <div class="scroll-container">
            <?php
                $sql = "SELECT * FROM tk_articulos WHERE categoria = 'Extras'";
                $result = mysqli_query($link,$sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_array()) {
                        echo "<div class='articulo'>";
                        echo "<div class='img-articulo'><img src='imagenes/Productos/".$row["imagen"]."' height='100%'></div>";
                        echo "<div class='info-articulo'><h2>" . $row["nombre"] . "</h2>";
                        echo "<p>Precio: $" . $row["precio"] . "</p>";
                        echo "<p class='desc'>Descripción: " . $row["descripcion"] . "</p></div>";
                        $result1 = mysqli_query($link, "SELECT nombre, administrador FROM tk_usuarios WHERE id = '$id'");
                        $row1 = mysqli_fetch_array($result1);
                        if($row1['administrador'] > 0){ ?><?php // Usuario
                            echo "<p class='agregar'><b>VISTA PREVIA</b></p>";                   
                            echo "</div>";                            
                        }else {
                            echo "<form action='html/formularios/tk_agregar_al_carrito.php' method='POST'>";
                            echo "<input type='hidden' name='id' value='".$row['id']."'>";
                            echo "<button class='add agregar' value='Agregar al carrito'>Agregar al carrito</button>";
                            echo "</form>";                   
                            echo "</div>";
                        }
                    }
                }      
                else {
                    echo "No hay productos en la base de datos";
                }
            ?>
            </div>
        </div>
        <?php
            if($row1['administrador'] > 0){ ?><?php // Admin y Repartidor
               
            }else {
                echo '<div class="container">
                <div class="fixed-btn">
                    <div class="carrito">
                        <a href="html/formularios/carrito.php"><img src="imagenes/carrito.png" width="100%" height="100%" title="Carrito" id="carrito">
                        </a>
                    </div>
                </div>
             </div>';
            }
        ?>

        <?php 
            if($_SESSION){
            $sql = "SELECT validado FROM tk_usuarios WHERE id = $_SESSION[autenticado]";
            $result = mysqli_query($link,$sql);
            $row = mysqli_fetch_array($result);

            if($row['validado'] == 0) { ?>
                <div class="container">
                    <div class="verif">
                        <a href="html/formularios/tk_validar.php">En Proceso de validación de cuenta<br>Haga click para ver más</a>
                    </div>
                </div>
            <?php } else if($row['validado'] == 1) { ?>
                <div class="container">
                    <div class="verif_err">
                        <a href="html/formularios/tk_validar_nuevamente.php">Error en la validacion de la cuenta!!!<br>Haga click para ver más</a>
                    </div>
                </div>
            <?php }

            $sql = "SELECT COUNT(*) as count FROM tk_pedidos WHERE cte_id = $_SESSION[autenticado] AND estado = 'EN PROCESO'";
            $result = mysqli_query($link,$sql);
            $row = mysqli_fetch_array($result);

            if($row['count'] > 0) { ?>
                <div class="container">
                    <div class="pdo">
                        <a href="html/formularios/seguimientoPedido.php">Pedido actualmente en proceso<br>Haga click para ver más</a>
                    </div>
                </div>
            <?php }
        } ?>
    </body>
    
    <footer>
        <table id="footer" width="100%" align="center">
            <tr>
                <td align="left" width="33%">
                    <img src="imagenes/trfooter.png" width="40%">
                </td>

                <td align="center" width="33%">
                    ©2023 Trinken Be Safe
                </td>

                <td align="right" width="33%">
                    <a href="https://www.facebook.com/TrinkenApp/" target="_blank">
                        <img src="imagenes/fb.png" width="10%"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://play.google.com/store/apps/details?id=com.trinken.android" target="_blank">
                        <img src="imagenes/ps.png" width="10%"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://www.instagram.com/trinkenbesafe/" target="_blank">
                        <img src="imagenes/ig.png" width="10%"></a>
                </td>
            </tr>
        </table>
    </footer>
</html>