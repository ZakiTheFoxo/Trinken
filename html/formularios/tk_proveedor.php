
<?php 
	include "seguridad_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF=8">
		<title>Formulario Borrar artículo</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<link rel="stylesheet" href="../../css/main.css">

        <script>
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
        <p><form id="live-search" action="" class="styled" method="post">
            <table align="center" cellpadding='10px'>
                <tr>
                    <td align='center'>
                        <b>Buscar:</b>
                        <input type="text" class="text-input" id="filter" placeholder="Buscar" />
                        <span id="filter-count"></span>
                    </td>
                    <td>ó</td>
                    <td align='center'>
                        <a href="tk_anadir_proveedor.php"><input type="button" value="Agregar Proveedor"></a>
                    </td>
                </tr>
            </table>
        </form></p>
		<a href="../../body.php" class="btn btn-secondary">Regresar</a>
        <p><?php 
            $result = mysqli_query($link, "
                SELECT p.id, p.nombre_de_la_empresa, p.correo_electronico, p.celular
                FROM tk_proveedores p 
                ORDER BY p.id, p.nombre_de_la_empresa;
            ");

            if(mysqli_num_rows($result) > 0){?>
                <div class='table-responsive'><table width='1000px' align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='6' align='center'><b>Trinken Proveedores</b></td></tr>

                <tr><td>ID</td><td>Nombre de la empresa</td><td>Correo Electrónico</td><td>Celular</td><td></td></tr>

                <?php while($row = mysqli_fetch_array($result)){
                    printf("<tr class='search' border='1'><td>%d</td><td>%s</td><td>%s</td><td>%d</td>
                        <form method='post' action='tk_editar_proveedor.php'><input type='hidden' name='id' value='".$row['id']."'><td><button class='add'>Editar</button></td></form>
                        <form method='post' action='tk_eliminar_proveedor.php'><input type='hidden' name='id' value='".$row['id']."'><td><button class='del'>Borrar</button></td></form></tr>", 
                        $row["id"], $row["nombre_de_la_empresa"], $row["correo_electronico"], $row["celular"]);
                }?>

                </table></div>
            <?php }else{ ?>
                <table align='center' cellpadding='10px'><tr><td align='center'><b>No hay proveedores</b></td></tr></table>
            <?php }
            mysqli_free_result($result);
            mysqli_close($link);
        ?></p>
        <?php
			if ( $_GET ){ 
                if ($_GET['proveedor']==1){?> 
                    <script>alert("Proveedor agregado exitosamente");</script>
            <?php   }
				if ($_GET['proveedor']==2){?> 
					<script>alert("Proveedor modificado exitosamente");</script>
		    <?php }
                if ($_GET['proveedor']==3){?> 
                    <script>alert("Proveedor eliminado exitosamente");</script>
    <?php   }} ?>
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