<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Registrar Repartidor</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<link rel="stylesheet" href="../../css/main.css">

		<script type="text/javascript">
			$(document).ready(function(){
				$("#filter").keyup(function(){
			
					// Retrieve the input field text and reset the count to zero
					var filter = $(this).val(), count = 0;
			
					// Loop through the comment list
					$(".search").each(function(){
			
						// If the list item does not contain the text phrase fade it out
						if ($(this).text().search(new RegExp(filter, "i")) < 0) {
							$(this).hide();
			
						// Show the list item if the phrase matches and increase the count by 1
						} else {
							$(this).show();
							count++;
						}
					});
			
					// Update the count
					var numberItems = count;
					$("#filter-count").text("Resultados: "+count);
					if(filter == 0){
						$("#filter-count").text("");
					}
				});
			});
		</script>
	</head>

	<body>
		<form id="live-search" action="" class="styled" method="post">
            <table align="center" cellpadding='10px'>
                <tr>
                    <td align='center'>
                        <b>Buscar:</b>
                        <input type="text" class="text-input" id="filter" placeholder="Buscar" />
                        <span id="filter-count"></span>
                    </td>
                </tr>
            </table>
        </form>
		<a href="admin.php" class="btn btn-secondary">Regresar</a>

		<p><?php 
			$result = mysqli_query($link, "
				SELECT *
				FROM tk_repartidores;
			");

			if(mysqli_num_rows($result) > 0){ ?>
				<div class='table-responsive'><table align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='8' align='center'><b>Trinken Repartidores</b></td></tr>

				<tr><td>ID</td><td>Nombre</td><td>Apellidos</td><td>Correo</td><td>Celular</td><td>Sueldo</td><td>Comision</td><td></td></tr>

				<?php while($row = mysqli_fetch_array($result)){
					printf("<form method='post' action='tk_eliminar_repartidor2.php'><input type='hidden' name='id' value='".$row['id']."'><tr class='search' border='1'><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>$%0.2f</td><td>%0.2f</td><td><button class='btn btn-danger link' value='Borrar'>Borrar</button></td></tr></form>", 
						$row["id"], $row["nombre"], $row["apellidos"], $row["correo_electronico"], $row["celular"], $row["sueldo"], $row["comision"]);
				} ?>

				</table></div>
			<?php }else{ ?>
				<table align='center'><tr><td align='center'><b>No hay repartidores</b></td></tr></table>
			<?php }
			mysqli_free_result($result);
			mysqli_close($link);
		?></p>
		<?php
			if ( $_GET ){ 
				if ($_GET['borrarrepartidor']==1){
		?> 
					<script>alert("Repartidor eliminado exitosamente");</script>
		<?php }} ?>
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