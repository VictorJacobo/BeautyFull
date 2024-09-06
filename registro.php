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
    <hgroup>
        <h1>¡Registrate!</h1>
    </hgroup>
    <section class="container register">
        <form action="./php/registro_db.php" method="POST" class="row g-5 justify-content-center needs-validation" novalidate>
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre(s)</label>
                <input type="text" class="form-control" id="nombre" name="nomb" required>
            </div>
            <div class="col-md-4">
                <label for="paterno" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="paterno" name="pater" required>
            </div>
            <div class="col-md-4">
                <label for="materno" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="materno" name="mater" required>
            </div>
            
            <div class="col-md-4">
                <label for="calle" class="form-label">Calle</label>
                <input type="text" class="form-control" id="calle" name="call" required>
            </div>
            <div class="col-md-2">
                <label for="numero" class="form-label">Numero</label>
                <input type="text" class="form-control" id="numero" name="nume" required>
            </div>
            <div class="col-md-4">
                <label for="colonia" class="form-label">Colonia</label>
                <input type="text" class="form-control" id="colonia" name="col" required>
            </div>
            <div class="col-md-2">
                <label for="postal" class="form-label">Codigo Postal</label>
                <input type="text" class="form-control" id="postal" name="post" required>
            </div>
            <div class="col-md-6">
                <label for="celular" class="form-label">Número de celular</label>
                <input type="text" class="form-control" id="celular" name="cel" required>
            </div>
            <div class="col-md-6">
                <label for="fijo" class="form-label">Número fijo</label>
                <input type="text" class="form-control" id="fijo" name="fij">
            </div>
            <div class="col-md-6">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="cor" required>
            </div>
            <div class="col-md-6">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="user" required>
            </div>
            <div class="col-md-4">
                <label for="contra" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contra" name="pass" required>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 r-btn">
                    <button class="btn btn-lg" type="submit">Registrarse</button>
                </div>
            </div>
        </form>
    </section>

</body>
<?php include("pie.php"); ?>
</html>