<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header("Location: index.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="es">
<?php include("lib.php"); ?>
<body>
    <?php include("nav.php"); ?>
    <section class="container l-container">
        <hgroup>
            <h1>Iniciar Sesión</h1>
        </hgroup>
        <div class="row justify-content-center login">
            <div class="col-6 l-card">
                <div class="user">
                    <img src="./img/login.png" alt="usuario">
                </div>
                <form action="./php/login_db.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="contra" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contra" name="pass" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-md">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
<?php include("pie.php"); ?>
</html>