<?php
    include 'conexion.php';
    $dia = $_POST['dia'];
    $client = $_POST['cliente'];
    $horario = $_POST['horario'];
    $costo = $_POST['costo'];
    $hora_f = $_POST['hora_f'];
    $min_f = $_POST['min_f'];
    $s_1 = $_POST['c_1'];
    $s_2 = $_POST['c_2'];
    $s_3 = $_POST['c_3'];
    $s_4 = $_POST['c_4'];
    $s_5 = $_POST['c_5'];
    $s_6 = $_POST['u_1'];
    $s_7 = $_POST['u_2'];
    $s_8 = $_POST['u_3'];
    $s_9 = $_POST['u_4'];
    $unas = $_POST['pinta'];

    $query = "INSERT INTO citas(horario, hora_f, min_f, dia, costo, cliente, s_1, s_2, s_3, s_4, s_5, s_6, s_7, s_8, s_9, unas)
              VALUES('$horario','$hora_f','$min_f','$dia','$costo','$client','$s_1','$s_2','$s_3','$s_4','$s_5','$s_6','$s_7','$s_8','$s_9','$unas')";
    $ejecutar = mysqli_query($conexion, $query); 

    // Consulta SELECT para obtener el valor actual de citas del usuario
    $query_select = "SELECT citas FROM usuarios WHERE usuario = '$client'";
    $resultado_select = mysqli_query($conexion, $query_select);
    $fila_select = mysqli_fetch_assoc($resultado_select);
    $citas_actual = $fila_select['citas'];

    // Incrementa en uno el valor de citas del usuario
    $citas_nuevo = $citas_actual + 1;

    // Consulta UPDATE para actualizar el valor de citas del usuario
    $query_update = "UPDATE usuarios SET citas = $citas_nuevo WHERE usuario = '$client'";
    $resultado_update = mysqli_query($conexion, $query_update);
    if ($ejecutar && $resultado_update) {
        setcookie('acceso_permitido', 'true', time()+5, '/');
        header("Location: ./../cita_exito.php?c=exitoso");
    } else {
        header("Location: ./../cita_exito.php?c=fallido");
    }
?>