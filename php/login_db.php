<?php

    include 'conexion.php';

    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' and contra='$pass'");

    if (mysqli_num_rows($validar_login) > 0) {
        // Iniciar sesión
        $query_nombre = mysqli_query($conexion, "SELECT usuario FROM usuarios WHERE correo='$correo'");
        $row_nombre = mysqli_fetch_assoc($query_nombre);
        $nombre = $row_nombre['usuario'];
        session_start();
        $_SESSION['usuario'] = $nombre;
        // Establecer una cookie con la información de la sesión
        $expire = time() + (60 * 60 * 24 * 30); // Caduca en 30 días
        setcookie('usuario', $nombre, $expire, '/');
        header("Location: ./../index.php");
    } else {
        echo '<script>
                alert("Usuario o contraseña invalidos, por favor verifique los datos introducidos");
                window.location = "./../login.php";
              </script>';
              exit;
    }
?>