<?php 
    include 'conex.php';
    $link = Conectarse();

    $id = $_POST['id'];

    mysqli_query($link, "UPDATE tk_usuarios SET validado = 2 WHERE id = $id");

    $sql_del_files = "
            SELECT imagen_ine
            FROM tk_usuarios
            WHERE id = $id";

        $result = mysqli_query($link, $sql_del_files);
        $row = mysqli_fetch_array($result);

        if($row['imagen_ine'])
            unlink('../../imagenes/INE/'.$row['imagen_ine']);

    mysqli_close($link);

    header("Location: tk_verificar_ine.php?validacion=2");
?>