<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario'] != "admin"){
            header("Location: index.php");
            die();
        }
    } else {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/img/icono.png">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Beauty Full</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="#" class="logo">Beauty Full</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a href="./admin.php">Administrador</a>
                        <a href="./php/cerrar_sesion.php">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <hgroup>
        <h1>Usuarios</h1>
    </hgroup>
    <?php 
        include("./php/conexion.php");
        $sql = "SELECT * FROM usuarios";
        $resultado = mysqli_query($conexion, $sql);
        $nUsers = mysqli_num_rows($resultado);
        if($nUsers > 0){
            $filas = ceil($nUsers / 3);
            for ($i=0;$i<$filas;$i++){
                print('<div class="row auser justify-content-center">');
                for($j=0;$j<3;$j++){
                    if ($nUsers > 0){
                        $row = mysqli_fetch_assoc($resultado);
                        print('<a href="./user.php?q='. $row['usuario'] . '" class="col-md-3">
                        <div class="u-card">
                        <div>
                            <p>Nombre: </p>
                            <p>'. $row['nombre'] .'</p>
                        </div>
                        <div>
                            <p>Apellido Paterno: </p>
                            <p>'. $row['paterno'] .'</p>
                        </div>
                        <div>
                            <p>Apellido Materno: </p>
                            <p>'. $row['materno'] .'</p>
                        </div>
                        <div>
                            <p>Username: </p>
                            <p>'. $row['usuario'] .'</p>
                        </div>
                    </div></a>');
                        $nUsers -= 1;
                    }
                }
                print('</div>');
            }
            
        }else{
            print('<div class="row auser justify-content-center">
                <div class="col-lg-6 text-center"><h2>Parece que no usuarios</h2></div>
        </div>');
        }
        mysqli_close($conexion);
    ?>
</body>
<footer class="text-center text-white">
    <div class="pie text-center p-3">
        © 2023 Copyright:
        <a class="text-white" href="#">BeautyFull.com</a>
    </div>
</footer>
<script src="./boot/js/bootstrap.min.js"></script>
</html>