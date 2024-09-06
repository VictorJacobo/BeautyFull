<?php
    include("conexion.php");
    $q = $_GET["q"];
    $sql = "SELECT * FROM usuarios WHERE usuario='$q'";
    $resultado = mysqli_query($conexion, $sql);

    $json = array();
    if(mysqli_num_rows($resultado) > 0){
        while ($row = mysqli_fetch_assoc($resultado)) {
            $user = array(
                "nCitas" => $row['citas']
            );
            $json[] = $user;
        }
    }else{
        $json['mensaje'] = "No se encontraron resultados para el usuario especificado";
    }
    echo json_encode($json);
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
?>