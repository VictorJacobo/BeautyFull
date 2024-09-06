<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario'] != "admin"){
            header("Location: index.php");
            die();
        } else {
            $user = $_GET["q"];
            if(!$user){
                header("Location: index.php");
            }
        }
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
    <?php
        include("./php/conexion.php");
        $sql = "SELECT * FROM usuarios WHERE usuario='$user'";
        $resultado = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($resultado);
        print('
        <hgroup>
            <h1>'. $row['usuario'].'</h1>
        </hgroup>
        <section class="container register">
            <form class="row g-5 justify-content-center needs-validation">
                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre(s)</label>
                    <input type="text" class="form-control" id="nombre" name="nomb" value="'. $row['nombre'].'" disabled>
                </div>
                <div class="col-md-4">
                    <label for="paterno" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="paterno" name="pater" value="'. $row['paterno'].'" disabled>
                </div>
                <div class="col-md-4">
                    <label for="materno" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="materno" name="mater" value="'. $row['materno'].'" disabled>
                </div>
                
                <div class="col-md-4">
                    <label for="calle" class="form-label">Calle</label>
                    <input type="text" class="form-control" id="calle" name="call" value="'. $row['calle'].'" disabled>
                </div>
                <div class="col-md-2">
                    <label for="numero" class="form-label">Numero</label>
                    <input type="text" class="form-control" id="numero" name="nume" value="'. $row['num'].'" disabled>
                </div>
                <div class="col-md-4">
                    <label for="colonia" class="form-label">Colonia</label>
                    <input type="text" class="form-control" id="colonia" name="col" value="'. $row['colonia'].'" disabled>
                </div>
                <div class="col-md-2">
                    <label for="postal" class="form-label">Codigo Postal</label>
                    <input type="text" class="form-control" id="postal" name="post" value="'. $row['postal'].'" disabled>
                </div>
                <div class="col-md-6">
                    <label for="celular" class="form-label">Número de celular</label>
                    <input type="text" class="form-control" id="celular" name="cel" value="'. $row['celular'].'" disabled>
                </div>
                <div class="col-md-6">
                    <label for="fijo" class="form-label">Número fijo</label>
                    <input type="text" class="form-control" id="fijo" name="fij" value="'. $row['fijo'].'" disabled>
                </div>
                <div class="col-md-6">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="cor" value="'. $row['correo'].'" disabled>
                </div>
                <div class="col-md-6">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="username" name="user" value="'. $row['usuario'].'" disabled>
                </div>
                <div class="col-md-6">
                    <label for="citas" class="form-label">Numero de citas</label>
                    <input type="text" class="form-control" id="username" name="citas" value="'. $row['citas'].'" disabled>
                </div>
            </form>
        </section>
        ')
    ?>
    <hgroup>
            <h1>Citas</h1>
    </hgroup>
    <?php 
        $sql = "SELECT * FROM citas WHERE cliente='$user'";
        $resultado = mysqli_query($conexion, $sql);
        $nCitas = mysqli_num_rows($resultado);
        if($nCitas > 0){
            $filas = ceil($nCitas / 3);
            for ($i=0;$i<$filas;$i++){
                print('<div class="row auser justify-content-center">');
                for($j=0;$j<3;$j++){
                    if ($nCitas > 0){
                        $row = mysqli_fetch_assoc($resultado);
                        print('<div class="col-md-3">
                        <div class="u-card">
                        <div>
                            <p>Dia: </p>
                            <p>'. $row['dia'] .'</p>
                        </div>
                        <div>
                            <p>Horario: </p>
                            <p>'. $row['horario'] .'</p>
                        </div>
                        <div>
                            <p>Costo: </p>
                            <p>'. $row['costo'] .'</p>
                        </div>
                        <div>
                            <p>Uñas: </p>
                            <p>'. $row['unas'] .'</p>
                        </div>
                    
                    <p>Servicios:</p>');
                    if($row['s_1'] != NULL){
                        print('<p>'.$row['s_1'].'</p>');
                    }
                    if($row['s_2'] != NULL){
                        print('<p>'.$row['s_2'].'</p>');
                    }
                    if($row['s_3'] != NULL){
                        print('<p>'.$row['s_3'].'</p>');
                    }
                    if($row['s_4'] != NULL){
                        print('<p>'.$row['s_4'].'</p>');
                    }
                    if($row['s_5'] != NULL){
                        print('<p>'.$row['s_5'].'</p>');
                    }
                    if($row['s_6'] != NULL){
                        print('<p>'.$row['s_6'].'</p>');
                    }
                    if($row['s_7'] != NULL){
                        print('<p>'.$row['s_7'].'</p>');
                    }
                    if($row['s_8'] != NULL){
                        print('<p>'.$row['s_8'].'</p>');
                    }
                    if($row['s_9'] != NULL){
                        print('<p>'.$row['s_9'].'</p>');
                    }
                    print('</div></div>');
                        $nCitas -= 1;
                    }
                }
                print('</div>');
            }
            
        }else{
            print('<div class="row auser justify-content-center">
                <div class="col-lg-6 text-center"><h2>Parece que no hay citas</h2></div>
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