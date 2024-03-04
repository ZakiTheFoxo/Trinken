<?php 
	include 'seguridad.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Pedidos Repartidor</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/main.css">
	</head>

	<body>
        <?php
            $cte_id = $_SESSION['autenticado'];
            $celnum = mysqli_query($link, "
                SELECT celular 
                FROM tk_usuarios
                WHERE id = $cte_id;  
            ");
            $row = mysqli_fetch_array($celnum);

            $rpr_id = mysqli_query($link, "
                SELECT r.id as id 
                FROM tk_repartidores r join tk_usuarios u on r.celular = u.celular
                WHERE u.celular = $row[celular];
            ");
            $row = mysqli_fetch_array($rpr_id);

            $result = mysqli_query($link, "
            SELECT p.id as id, fecha, hora, total, nombre, apellidos 
            FROM tk_pedidos p left outer join tk_repartidores r on p.rpr_id = r.id 
            WHERE rpr_id = $row[id] and estado = 'EN PROCESO';
            ");?>

                <div class="header">
                    <font color="white" style="position:relative; left:1%" size="8%">
                        <p>Pedidos Pendientes</p>
                    </font>
                </div>

            <?php if(mysqli_num_rows($result) > 0){
                ?><br><div class='table-responsive' style='display:flex'><?php
                while($row = mysqli_fetch_array($result)){
                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_array()) { ?>
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
                                <td><form action='tk_pedidos_procesa.php' method='POST'>
                                    <input type='hidden' name='id' value="<?=$row['id']?>">
                                    <button class='add' value='editar'>COMPLETAR</button>
                                </form>
                                </td>    
                            </tr>
                            </table>
                        
                    <?php } 
                    }
                }
            ?></div>
            <?php
            }else{?>
                <br><table align='center' cellpadding='10px'><tr><td align='center'><b>No hay pedidos pendientes</b></td></td></tr></table><br><?php
            }

            //Historial de Pedidos
			$sql = "SELECT fecha, hora, total, nombre, apellidos FROM tk_pedidos left outer join tk_repartidores on tk_pedidos.rpr_id = tk_repartidores.id WHERE cte_id = $cte_id and estado = 'COMPLETADO' or estado = 'CANCELADO';";
			$result = mysqli_query($link,$sql);
			?>
            <br><br>
            <div class="header">
                <font color="white" style="position:relative; left:1%" size="8%">
                    <p>Historial de Pedidos</p>
                </font>
            </div>
            <?php if ($result->num_rows > 0) { ?>
                <div class='table-responsive' style='display:flex'>
                <?php while($row = $result->fetch_array()) { ?>
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
                    </table>
                    <?php } ?>
                </div>
            <?php }

            mysqli_free_result($result);
            mysqli_close($link);
        ?></p>
       
		<a href="../../body.php" class="btn btn-secondary">Regresar</a>
        <br>
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
