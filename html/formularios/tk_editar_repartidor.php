
<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Editar Repartidor</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/main.css">
	</head>

	<body>
        <p><?php 
            $result = mysqli_query($link, "
                SELECT r.id, r.nombre, r.apellidos, r.correo_electronico, r.celular, r.sueldo, r.comision
                FROM tk_repartidores r 
                ORDER BY r.id, r.nombre;
            ");

            if(mysqli_num_rows($result) > 0){
                echo "<div class='table-responsive'><table align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='8' align='center'><b>Trinken Artículos</b></td></tr>";

                printf("<tr><td>ID</td><td>Nombre</td><td>Apellido</td><td>Correo Electrónico</td><td>Celular</td><td>Sueldo</td><td>Comisión</td><td></td></tr>");

                while($row = mysqli_fetch_array($result)){
                    printf("<form method='post' action='tk_editar_repartidor2.php'><input type='hidden' name='id' value='".$row['id']."'><tr border><td>%d</td><td>%s</td><td>%d</td><td>%s</td><td>%s</td><td>%d</td><td>%s</td><td><button class='add' value='editar'>Editar</button></td></tr></form>", 
                        $row["id"], $row["nombre"], $row["apellidos"], $row["correo_electronico"], $row["celular"], $row["sueldo"], $row["comision"]);
                }

                echo '</table></div>';
            }else{
                echo "<table align='center' cellpadding='10px'><tr><td align='center'><b>No hay repartidores</b></td></tr></table>";
            }
            mysqli_free_result($result);
            mysqli_close($link);
        ?></p>
        <?php
			if ( $_GET ){ 
				if ($_GET['editarrepartidor']==1){
		?> 
					<script>alert("Repartidor modificado exitosamente");</script>
		<?php }} ?>
		<a href="admin.php" class="btn btn-secondary">Regresar</a>
	</body>

	<footer>
        <table id="footer" width="100%" align="center">
            <tr>
                <td align="left" width="33%">
                    <img src="../../imagenes/trfooter.png" width="40%">
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
