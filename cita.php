<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario'] == "admin"){
            header("Location: index.php");
            die();
        }
    } else {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<?php include("lib.php"); ?>
<body>
    <?php include("nav.php"); ?>
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['usuario'])){
            print('<p class="inv" id="user">' . $_SESSION['usuario'] .'</p>');
        } else {
            print('<p class="inv" id="user"></p>');
        }
    ?>
    <hgroup>
            <h1>Agendar cita</h1>
        </hgroup>
    <section class="container cita">
            <div id="calendar">
            </div>
            <div id="reserva">
            </div>
        <p>Nuestro horario es de 8:00 a.m. a 8:00 p.m.</p>
        <form action="./php/cita_db.php" method="POST">
            <
            <h1>Seleccione los servicios de cabello</h1>
            <div class="row" id="s_cabello">
                
            </div>
            <h1>Seleccione los servicios de uñas</h1>
            <div class="row" id="s_unas">
                
            </div>
            <h1>¿Quiere algun tipo de uña?</h1>
            <div class="row" id="s_pint">
                
            </div>
            <div class="row c">
                <div class="col-sm-6 f-card">
                    <h2>Datos de la cita</h2>
                    <div>
                        <p>Horario:</p>
                        <p id="hora">Elija algun servicio</p>
                    </div>
                    <div>
                        <p>Tiempo total:</p>
                        <p id="tiempo">0 min</p>
                    </div>
                    <div>
                        <p>Costo total:</p>
                        <p id="costo">$0</p>
                    </div>
                    <div id="desc">
                    </div>
                    <input type="number" class="inv" id="dia" name="dia" value=" ">
                    <input type="text" class="inv" id="client" name="cliente" value=" ">
                    <input type="text" class="inv" id="hor" name="horario" value=" ">
                    <input type="number" class="inv" id="cost" name="costo" value=" ">
                    <input type="number" class="inv" id="hora_f" name="hora_f" value=" ">
                    <input type="number" class="inv" id="min_f" name="min_f" value=" ">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-md" id="agendar" disabled>Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>
<footer class="text-center text-white">
    <div class="pie text-center p-3">
        © 2023 Copyright:
        <a class="text-white" href="#">BeautyFull.com</a>
    </div>
</footer>
<script src="./boot/js/bootstrap.min.js"></script>
<script src="./js/servicios.js"></script>
</html>