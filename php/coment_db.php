<?php
    include 'conexion.php';

    $correo = $_POST['correo'];
    $coment = $_POST['coment'];

    $query = "INSERT INTO comentarios(correo, coment)
              VALUES('$correo','$coment')";
    $ejecutar = mysqli_query($conexion, $query);
    
    if ($ejecutar) {
        setcookie('acceso_permitido', 'true', time()+5, '/');
        header("Location: ./../c_exito.php?coment=exitoso");
    } else {
        header("Location: ./../c_exito.php?coment=fallido");
    }
?>