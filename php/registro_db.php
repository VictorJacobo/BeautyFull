<?php
    include 'conexion.php';

    $nomb = $_POST['nomb'];
    $pater = $_POST['pater'];
    $mater = $_POST['mater'];
    $call = $_POST['call'];
    $nume = $_POST['nume'];
    $col = $_POST['col'];
    $post = $_POST['post'];
    $cel = $_POST['cel'];
    $fij = $_POST['fij'];
    $cor = $_POST['cor'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $query = "INSERT INTO usuarios(nombre, paterno, materno, calle, num, colonia, postal, celular, fijo, correo, usuario, contra, citas)
              VALUES('$nomb','$pater','$mater','$call','$nume', '$col', '$post', '$cel', '$fij', '$cor', '$user', '$pass', 0)";
    
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$cor'");
    setcookie('acceso_permitido', 'true', time()+5, '/');
    if(mysqli_num_rows($verificar_correo) > 0) {
        header("Location: ./../r_exito.php?registro=correo");
        exit();
    }

    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$user'");

    if(mysqli_num_rows($verificar_usuario) > 0) {
        header("Location: ./../r_exito.php?registro=usuario");
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        header("Location: ./../r_exito.php?registro=exitoso");
    } else {
        header("Location: ./../r_exito.php?registro=fallido");
    }
?>