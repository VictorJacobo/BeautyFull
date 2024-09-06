<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario'] == "admin"){
            header("Location: admin.php");
            die();
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
    <?php include("nav.php"); ?>
    <hgroup>
        <h1>Contacto</h1>
    </hgroup>
    <section class="container contact">
        <div class="row">
            <div class="col-12">
                <p class="c-text">¿Dudas? ¿Comentarios? ¡Haznos saber!</p>
            </div>
        </div>
        <form action="./php/coment_db.php" method="POST"  class="needs-validation" novalidate>
            <div class="mb-3 ">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" placeholder="correo@ejemplo.com" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="comentario" class="form-label">Escriba su comentario</label>
                <textarea class="form-control" id="comentario" rows="3" name="coment" required></textarea>
            </div>
            <div class="mb-3 row justify-content-center">
                <div class="col-6">
                    <button type="submit" class="btn btn-lg" name="contacto">Enviar</button>
                </div>
            </div>
        </form>
    </section>
</body>
<?php include("pie.php"); ?>
</html>

