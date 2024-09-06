<?php
if(!(isset($_COOKIE['acceso_permitido']) && $_COOKIE['acceso_permitido'] == 'true')){
    header("Location: cita.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<?php include("lib.php"); ?>
<body>
    <?php include("nav.php"); ?>
    <?php
    if(isset($_GET['c'])) {
        if ($_GET['c'] == 'exitoso') {
            print ("<hgroup>
            <h1>El envio fue exitoso</h1>
        </hgroup>
        <div class='row g-2 justify-content-center'>
            <div class='estado col-3'>
                <img src='./../img/exito.png' alt='exito'>
            </div>
            <div class='col-12 text-center'>
                <p>Cita agendada con exito</p>
            </div>
        </div>");
        } elseif ($_GET['coment'] == 'fallido') {
            print ("<hgroup>
            <h1>Error en el envio/h1>
        </hgroup>
        <div class='row g-2 justify-content-center'>
            <div class='estado col-3'>
                <img src='./../img/fallo.png' alt='exito'>
            </div>
            <div class='col-12 text-center'>
                <p>Hubo un error al agendar la cita :c</p>
            </div>
        </div>");
        } 
}
?>
    
    
    
</body>
<?php include("pie.php"); ?>
</html>