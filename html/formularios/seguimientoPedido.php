<?php 
	include "seguridad.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Seguimiento del pedido</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../css/main.css">
	</head>
	<body>
        <div class="header">
            <font color="white" style="position:relative; left:1%" size="8%">
                <p align="center"><b>BARK Be Safe</b></p>
            </font>
        </div>
        <font color="white" style="position:relative; left:1%" size="6%">
            <p align="center">¡Gracias por comprar con nosotros! Esperamos que tengas un gran día ;)</p>
        </font>
        <a href="../../body.php" class="btn btn-secondary">Regresar</a>

		<?php
			$cte_id = $_SESSION['autenticado'];
			$sql = "SELECT p.id as id, fecha, hora, total, nombre, apellidos FROM tk_pedidos p left outer join tk_repartidores r on p.rpr_id = r.id WHERE cte_id = $cte_id and estado = 'EN PROCESO';";
			$result = mysqli_query($link,$sql);
			if ($result->num_rows > 0) { 
                while($row = $result->fetch_array()) { ?>
                <p><div class='table-responsive'>
                    <table align='center' cellpadding='10px' cellspacing='20px'>
                        <tr>
                            <td colspan='4' align='center'>
                                <b>Pedido realizado</b>
                            </td>
                        </tr> 
                        <tr>
                            <td>
                                <b>Fecha del pedido:</b> <?=$row["fecha"]?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Hora del pedido:</b> <?=$row["hora"]?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Repartidor:</b> <?=$row["nombre"] . " " . $row["apellidos"]?>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Total:</b> <?=$row['total']?>
                            </td>
                        </tr>
                        <tr>
                            <td align='center' colspan='4'>
                                <b>¡Su pedido llegará pronto!</b>
                            </td>
                        </tr>
                        <tr>
                            <td align='center' colspan='4'>
                                <form method="POST" action="tk_cancelar_pedido_procesa.php" id="myForm">
                                    <input type="hidden" name="id" value="<?=$row['id']?>">
                                    <button class='del'>Cancelar Pedido</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div></p>
            <?php } 
            } else { ?>
                <p><table align='center' cellpadding='10px' cellspacing='20px'>
                    <tr>
                        <td>
                            <b>No hay pedidos en proceso</b><br>
                            Empiece a animar sus fiestas comprando algo en <b>Trinken</b> ;)
                        </td>
                    </tr>
                </table></p>
            <?php } 
            if($_GET) { 
                if($_GET['cancelado'] == 1) {?>
                    <script>alert("Pedido Cancelado con Éxito");</script>
            <?php }} ?>
    </body>
    
    <footer>
        <table id="footer" width="100%" align="center">
            <tr>
                <td align="left" width="33%">
                    <img src="../../imagenes/trfooter.png" width="40%">
                </td>

                <td align="center" width="33%">
                    ©2023 BARK Be Safe
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