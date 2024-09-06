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
<?php include("lib.php"); ?>
<body>
    <?php include("nav.php"); ?>
    <hgroup>
        <h1>Galería de uñas</h1>
    </hgroup>
    <section class="container" id="principal">
        
    </section>
</body>
<?php include("pie.php"); ?>
<script src="./js/unas.js"></script>
</html>