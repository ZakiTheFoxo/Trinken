<?php
    include ('seguridad.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Carrito procesa</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
        <style type="text/css">
			body{
				background-color: black;
				font-family: sans-serif;
			}

			table:not(#footer, #info){
                background: linear-gradient(rgba(255,192,44,1) 0%, rgba(255,27,93,1) 100%);
				background-repeat: no-repeat;
				border-radius: 20px 20px;
				padding: 3%;
				background-size: 100% 100%;
			}

            table[id=info]{
                background-color: #ffffff;
                border-radius: 20px 20px;
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
       <script>
        $(document).ready(function(){
            $(document).on("click","#btn-agregar",function () {
            var variable = $("#num-exist").val();
            if (confirm('¿Desea agregar '+variable+' al carrito?')) {
            
            }
            alert("Producto Agregado al Carrito");
            });
        });
        </script>
			<p><table cellpadding="10px" align="center" width="50%">
                <?php
                    include("conex.php");
                    $link = Conectarse();
                    $ato_id=$_POST["id"];
                    $cte_id = $_SESSION['autenticado'];
                    $sql1= "SELECT * from tk_articulos WHERE id=$ato_id";
                    $result1 = mysqli_query($link,$sql1);
                    $row = $result1->fetch_array();
                        echo "<tr>";
                            echo "<td>";					
                                echo "<img src='../../imagenes/Productos/".$ato_id.".png' height=45%>";
                            echo "</td>";
                            
                            echo "<td>";?>
                            <p><table id="info" cellpadding="25px" align="center" width="80%">
                                <?php
                                echo "<tr>";					
                                    echo "<td>";					
                                        echo "<h2>" . $row["nombre"] . "</h2>";
                                    echo "</td>";
                                    echo "<td>";					
                                        echo "<p>Precio: $" . $row["precio"] . "</p>";
                                    echo "</td>";
                                    echo "<td>";					
                                        echo "<p class='desc'>Descripción: " . $row["descripcion"] . "</p>";
                                    echo "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                if ($row["existencia"]>=1){
                                    echo "<td>";
                                        echo "<a>Cantidad deseada</a>";
                                    echo"</td>";
                                    echo "<td>";
                                        echo "<input id='num-exist' type='number' min='1' max='" . $row["existencia"] . "' step='1'>";
                                    echo"</td>";?>
                                    <td align='left'>
                                        <br><input type="button" id="btn-agregar" class='btn btn-primary agregar' onclick="verificarDatos()" value="Agergar al Carrito">
                                    </td>;
                                     <?php }
                                else {
                                    echo "<td colspan='3'>";
                                        echo "No hay existencias de este artículo";
                                    echo "</td>";
                                }
                                echo "</tr>";
                            echo "</td>";
                        echo "</tr>";
                ?>
			</table></p>
		<?php
			if ( $_GET ){ 
				if ($_GET['articuloagregado']==1){
		?> 
					<script>alert("Artículo agregado exitosamente");</script>
		<?php }} ?>
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