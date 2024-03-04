<?php 
	include 'seguridad.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Editar Perfil</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/main.css">
	</head>

	<body>
        <?php
            $result = mysqli_query($link, "SELECT * FROM tk_usuarios WHERE id = $_SESSION[autenticado];"); ?>

            <div class="header">
                <font color="white" style="position:relative; left:1%" size="8%">
                    <p>Mi Perfil</p>
                </font>
            </div>

            <?php if(mysqli_num_rows($result) > 0){ ?>
                <div class='table-responsive'><table align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='8' align='center'></td></tr>

                <?php while($row = mysqli_fetch_array($result)){
                    printf("<form method='post' action='tk_editar_perfil2.php'><input type='hidden' name='id' value='".$row['id']."'><input type='hidden' name='admin' value='".$row['administrador']."'><tr border><tr><td>Correo: %s</td></tr><tr><td>Celular: %s</td></tr><td><button class='add' value='editar'>Editar</button></td></tr></form><br>", 
                    $row["correo_electronico"], $row["celular"]);
                } ?>

                </table></div>
            <?php }else{ ?>
                <table align='center' cellpadding='10px'><tr><td align='center'><b>No hay repartidores</b></td></tr></table> <br>
            <?php } 
            if ( $_GET ){ 
				if ($_GET['editarperfil']==1){
		?> 
					<script>alert("Perfil modificado exitosamente");</script>
		<?php }} ?>

        
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
