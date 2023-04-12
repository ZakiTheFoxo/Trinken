<?php
    include ('seguridad.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Carrito</title>
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

			.btn{
                position: relative;
                margin-top: 10px;
                left: 47%;
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
            $ato_id=$_POST["id"];
            $cte_id = $_SESSION['autenticado'];
            $sql1= "SELECT * from tk_carrito WHERE id=$cte_id";
            $result1 = mysqli_query($link,$sql1);
            while($row = mysqli_fetch_array($result1)){
                echo "<tr>";
                    echo "<td>";					
                        echo "<img src='../../imagenes/Productos/".$ato_id.".png' height=45%>";
                        echo "</td>";    
                echo "<td>";?>
                <p><table id="info" cellpadding="25px" align="center" width="80%">
                    <?php
                    echo "<tr>";					
                        echo "<td>";					
                            echo "<h2>" . $row["nomb"] . "</h2>";
                        echo "</td>";
                        echo "<td>";					
                            echo "<p>Precio: $" . $row["precio"] . "</p>";
                        echo "</td>";
                        echo "<td>";					
                            echo "<p class='desc'>Descripción: " . $row["descripcion"] . "</p>";
                        echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                }
?>