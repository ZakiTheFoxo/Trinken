<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Verificar INE</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/main.css">
        <script>
            parent.window.frames["barra"].location.href = '../../BarraNav.php';
        </script>
	</head>

	<body>
		<p><?php
            $result = mysqli_query($link, "SELECT Count(*) as count FROM tk_usuarios WHERE validado = 0;");
            $count = mysqli_fetch_array($result);
			$result = mysqli_query($link, "
				SELECT * FROM tk_usuarios WHERE validado = 0;
			");
            if($count['count'] != 0){
            ?>
            <div class='table-responsive'>
                <table align='center' cellpadding='10px' cellspacing='20px'>
                    <tr>
                        <td colspan='4' align='center'>
                            <b>Verificar Cuenta por medio de la INE</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='4' align='center'>
                            Haga click en la imagen para verla con más detalle
                        </td>
                    </tr>
                    <tr>
                        <td><b>Imagen</b></td>
                        <td><b>Usuario</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <div class="container">
                                <td align="center">
                                    <a href="../../imagenes/INE/<?=$row['imagen_ine']?>" target="_blank"><img src="../../imagenes/INE/<?=$row['imagen_ine']?>" width="300px" height="200px"></a>
                                </td>
                            </div>
                            <td align="center"><?=$row['nombre']." ".$row['apellidos']." <br>Fecha: ".$row['fecha_nacimiento']?></td>
                            <td><form method="POST" action="tk_verificar_validar.php"><input type="hidden" name="id" value="<?=$row['id']?>"><button class='add'>Validar</button></form></td>
                            <td><form method="POST" action="tk_verificar_denegar.php"><input type="hidden" name="id" value="<?=$row['id']?>"><button class='del'>Denegar</button></form></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php mysqli_free_result($result);
        mysqli_close($link); ?>
		</p>
        <?php
			if ( $_GET ){ 
                if ($_GET['validacion']==1){?> 
                    <script>alert("Usuario Denegado exitosamente");</script>
            <?php   }
				if ($_GET['validacion']==2){?> 
					<script>alert("Usuario Validado Exitosamente");</script>
        <?php   }} } else {?>
            <div class='table-responsive'>
                <table align='center' cellpadding='10px' cellspacing='20px'>
                    <tr>
                        <td align='center'>
                            <b>Verificar Cuenta por medio de la INE</b>
                        </td>
                    </tr>
                    <tr>
                        <td align='center'>
                            No hay usuarios pendientes por verificar
                        </td>
                    </tr>
                </table>
            </div>
        <?php } ?>
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