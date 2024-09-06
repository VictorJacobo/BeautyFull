<?php
if(!(isset($_COOKIE['acceso_permitido']) && $_COOKIE['acceso_permitido'] == 'true')){
    header("Location: registro.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<?php include("lib.php"); ?>
<body>
    <?php include("nav.php"); ?>
    <?php
    if(isset($_GET['registro'])) {
        if ($_GET['registro'] == 'exitoso') {
            print ("<hgroup>
            <h1>El registro fue exitoso</h1>
        </hgroup>
        <div class='row g-2 justify-content-center'>
            <div class='estado col-3'>
                <img src='./../img/exito.png' alt='exito'>
            </div>
            <div class='col-12 text-center'>
                <p>Ya puede iniciar sesión</p>
            </div>
        </div>");
        } elseif ($_GET['registro'] == 'fallido') {
            print ("<hgroup>
            <h1>Error en el registro</h1>
        </hgroup>
        <div class='row g-2 justify-content-center'>
            <div class='estado col-3'>
                <img src='./../img/fallo.png' alt='exito'>
            </div>
            <div class='col-12 text-center'>
                <p>Hubo un error al registrar el usuario</p>
            </div>
        </div>");
        } elseif ($_GET['registro'] == 'correo') {
            print ("<hgroup>
            <h1>Error en el registro</h1>
        </hgroup>
        <div class='row g-2 justify-content-center'>
            <div class='estado col-3'>
                <img src='./../img/fallo.png' alt='exito'>
            </div>
            <div class='col-12 text-center'>
                <p>El correo ya fue registrado</p>
            </div>
        </div>");
    } elseif ($_GET['registro'] == 'usuario') {
        print ("<hgroup>
        <h1>Error en el registro</h1>
    </hgroup>
    <div class='row g-2 justify-content-center'>
        <div class='estado col-3'>
            <img src='./../img/fallo.png' alt='exito'>
        </div>
        <div class='col-12 text-center'>
            <p>El nombre de usuario ya existe</p>
        </div>
    </div>");
    }
}
?>
    
    
    
</body>
<?php include("pie.php"); ?>
</html>