<footer class="text-center text-white">
    <div class="container p-4 pb-0">
        <section>
        <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(isset($_SESSION['usuario'])){
                print('<p class="d-flex justify-content-center align-items-center">
                <a href="./cita.php">
                    <button type="button" class="btn btn-outline-light btn-rounded">
                    Agenda una cita
                    </button>
                </a>
            </p>');
            } else {
                    print('<p class="d-flex justify-content-center align-items-center">
                    <span class="me-3">Agenda una cita</span>
                    <a href="./registro.php">
                        <button type="button" class="btn btn-outline-light btn-rounded">
                            Registrate!
                        </button>
                    </a>
                </p>');
                    }
        ?>
        </section>
    </div>
    <div class="pie text-center p-3">
        © 2023 Copyright:
        <a class="text-white" href="#">BeautyFull.com</a>
    </div>
</footer>
<script src="./boot/js/bootstrap.min.js"></script>
