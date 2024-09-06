<header>
        <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="./index.php" class="logo">Beauty Full</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a href="./index.php">Inicio</a>
                        <a href="./contacto.php">Contacto</a>
                        <?php
                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                            }
                            if(isset($_SESSION['usuario'])){
                                print('<a href="./php/cerrar_sesion.php">Cerrar Sesión</a>');
                            } else {
                                print('<a href="./login.php">Login</a>
                                <a href="./registro.php">Registrate</a>');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>