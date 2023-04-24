
<?php 
    include("conex.php");
    $link = Conectarse();

    $id = $_POST['id'];
    $nom = $_POST['nom_rep'];
    $ape = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $cel = $_POST['celnum'];
    $sue = $_POST['sueldo'];
    $comi = $_POST['comision'];

    mysqli_query($link, "UPDATE tk_repartidores SET
    nombre = '$nom', apellidos = '$ape', correo_electronico = '$correo', celular = $cel, sueldo = $sue, comision = $comi WHERE id = $id") or die(mysqli_error($link));

    mysqli_close($link);   
?>

<script>
    window.location.replace('tk_editar_repartidor.php?editarrepartidor=1');
</script>