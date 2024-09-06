<?php
    include("conexion.php");
    $q = $_GET["q"];
    $sql = "SELECT * FROM citas WHERE dia='$q'";
    $resultado = mysqli_query($conexion, $sql);

    $json = array();
    if(mysqli_num_rows($resultado) > 0){
        while ($row = mysqli_fetch_assoc($resultado)) {
            $cita = array(
                "horario" => $row['horario'],
                "dia" => $row['dia'],
                "hora_f" => $row['hora_f'],
                "min_f" => $row['min_f'],
                "cliente" => $row['cliente']
            );
            $json[] = $cita;
        }
    }else{
        $json['mensaje'] = "No se encontraron resultados para la fecha especificada.";
    }
    echo json_encode($json);
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
?>