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
        <p><?php
            include "conex.php";
            $link = Conectarse();
            $contador=1;
            $result = mysqli_query($link, "
                SELECT id, nombre, apellidos, fecha_nacimiento, correo_electronico, celular, contrasena
                FROM tk_usuarios
                WHERE id = $_SESSION[autenticado];
                
            ");

            if(mysqli_num_rows($result) > 0){
                echo "<div class='table-responsive'><table align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='8' align='center'><b>Editar Mi Perfil</b></td></tr>";

                // printf("<tr><td>Nombre</td><td>Apellido</td><td>Fecha de Nacimiento</td><td>Correo Electrónico</td><td>Celular</td><td>Contraseña</td><td></td></tr>");

                while($row = mysqli_fetch_array($result)){
                    printf("<form method='post' action='tk_editar_perfil2.php'><input type='hidden' name='id' value='".$row['id']."'><tr border><tr><td>Nombre: %s</td></tr><tr><td>Apellidos: %s</td></tr><tr><td>Fecha de Nacimiento: %s</td></tr><tr><td>Correo: %s</td></tr><tr><td>Celular: %s</td></tr><tr><td>Contraseña: %s</td></tr><td><button class='add' value='editar'>Editar</button></td></tr></form><br>", 
                    $row["nombre"], $row["apellidos"], $row["fecha_nacimiento"], $row["correo_electronico"], $row["celular"], $row["contrasena"]);
                }

                echo '</table></div>';
            }else{
                echo "<table align='center' cellpadding='10px'><tr><td align='center'><b>No hay repartidores</b></td></tr></table> <br>";
            }

            $link = Conectarse();
            $result = mysqli_query($link, "
                SELECT *
                FROM tk_direccion_clientes
                WHERE cte_id = $_SESSION[autenticado];
                
            ");

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<br><div class='table-responsive' display='inline-block'><table align='center' cellpadding='10px' cellspacing='20px'><tr><td colspan='8' align='center'><b>Dirección ".$contador."</b></td></tr>
                    <tr><td><p class='desc'>Dirección: " . $row["direccion_linea_1"] . "</p></td></tr>
                    <tr><td><p class='desc'>Estado: " . $row["estado"] . "</p></td></tr>
                    <tr><td><p class='desc'>Ciudad: " . $row["ciudad"] . "</p></td></tr>
                    <tr><td><p class='desc'>Código Postal: " . $row["codigo_postal"] . "</p></td></tr>
                    <tr><td><form action='html/formularios/tk_editar_direccion.php' method='POST'>
                    <input type='hidden' name='id' value='".$row['cte_id']."'>
                    <button class='add' value='editar'>Editar</button>
                    </form>
                    </td>
                        <td>
                            <form action='html/formularios/tk_borrrar_direccion.php' method='POST'>
                            <input type='hidden' name='id' value='".$row['cte_id']."'>
                            <input type='hidden' name='direccion1' value='".$row['direccion_linea_1']."'>
                            <input type='hidden' name='estado' value='".$row['estado']."'>
                            <button class='add' value='editar'>Borrar</button>
                        </form>
                        </td>    
                    </tr>
                    $contador++
                    '</table></div>'";
                }
                echo "<td><a href='tk_anadir_direccion.php' class='btn btn-warning rounded-circle' style='width: 50px; height: 50px;'>
                <span class='visually-hidden'>Añadir</span>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus' viewBox='0 0 16 16'>
                <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
                </svg>
                </a></td>";
            }else{
                echo "<br><table align='center' cellpadding='10px'><tr><td align='center'><b>No hay direcciones añadidas</b></td> <td><a href='tk_anadir_direccion.php' class='btn btn-warning rounded-circle' style='width: 50px; height: 50px;'>
                <span class='visually-hidden'>Añadir</span>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus' viewBox='0 0 16 16'>
                <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
                </svg>
            </a></td></tr></table><br>";
            }
            


            mysqli_free_result($result);
            mysqli_close($link);
        ?></p>

        <?php
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
