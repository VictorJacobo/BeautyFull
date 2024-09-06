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
    <section class="contenedor container-md">
        <div class="container-fluid">
            <div class="carrusel-width">
                <div class="carousel slide" data-bs-ride="carousel" id="MiCarrusel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#MiCarrusel" data-bs-slide-to="0" class="active"
                            arial-label="Slide 1"></button>
                        <button type="button" data-bs-target="#MiCarrusel" data-bs-slide-to="1"
                            arial-label="Slide 2"></button>
                        <button type="button" data-bs-target="#MiCarrusel" data-bs-slide-to="2"
                            arial-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000" id="carusel-1">
                            <img src="img/peinado.png">
                            <div class="container">
                                <div class="carousel-caption">
                                    <p class="c-titular">Los mejores cortes y peinados</p>
                                    <a href="./peina.php">
                                        <button  class="btn btn-sm">Galeria de cortes y peinados</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="3000" id="carusel-2">
                            <img src="img/unas.jpg">
                            <div class="container">
                                <div class="carousel-caption">
                                    <p class="c-titular">Multiples diseños de uñas</p>
                                    <a href="./unas.php">
                                        <button  class="btn btn-sm">Galeria de uñas</button>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="3000" id="carusel-3">
                            <img src="img/product.jpg">
                            <div class="container">
                                <div class="carousel-caption">
                                    <p class="c-titular">Variedad de productos</p>
                                    <a href="./productos.php">
                                        <button  class="btn btn-sm">Galeria de productos</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#MiCarrusel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#MiCarrusel"
                        data-bs-slide="next">
                        <span class="visually-hidden">Siguiente</span>
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['usuario'])){
            print('<hgroup>
                            <h1>Bienvenido a Beauty Full ' . $_SESSION['usuario'] .'</h1>
                        </hgroup>');
        } else {
                print('<hgroup>
                            <h1>Bienvenido a Beauty Full</h1>
                        </hgroup>');
                }
    ?>
    
    <section class="container-sm">
        <div class="row servicios d-flex align-items-center">
            <div class="col-4 tarjeta d-flex flex-column align-items-center">
                <img src="/img/hairstyle.png" alt="hair">
                <h4>Estilo, cortes y peinados</h4>
                <p>Para disfrutar de un momento de relajación único y personalizado, dedicado a la belleza de tu cabello
                    y al bienestar de tu cuero cabelludo.</p>
                    <a href="./s_cabello.php">
                        <button  class="btn btn-sm">Ver servicios</button>
                    </a>
            </div>
            <div class="col-4 tarjeta d-flex flex-column align-items-center">
                <img src="/img/hand.png" alt="hand">
                <h4>Tratamiento y decoración de uñas</h4>
                <p>Elige entre una amplia gama de diseños y colores, todo a tu gusto.</p>
                <a href="./s_unas.php">
                    <button  class="btn btn-sm">Ver servicios</button>
                </a>
            </div>
            <div class="col-4 tarjeta d-flex flex-column align-items-center">
                <img src="/img/facet.png" alt="product">
                <h4>Maquillaje y productos</h4>
                <p>Productos de alta calidad y de marcas reconocidas que garantizan resultados excelentes.</p>
                <a href="./productos.php">
                    <button  class="btn btn-sm">Ver productos</button>
                </a>
            </div>
        </div>
    </section>
    <section class="container-fluid texto">
        <div class="row">
            <div class="col-10 about d-flex flex-column align-items-center">
                <p>
                    ¡Bienvenido a Beauty Full nuestro salón de belleza! Aquí en nuestro salón, ofrecemos una amplia variedad de
                    servicios para satisfacer todas tus necesidades de belleza. Desde peinados modernos y sofisticados
                    hasta manicuras y pedicuras profesionales, estamos dedicados a brindarte la mejor experiencia de
                    belleza posible.
                </p>
                <p>
                    Nuestros estilistas altamente capacitados y experimentados están siempre a la vanguardia de las
                    últimas tendencias y técnicas de belleza. Ya sea que estés buscando un cambio de imagen completo o
                    simplemente necesites un retoque rápido, nuestros servicios de peluquería y uñas te dejarán
                    sintiéndote fresco y renovado.
                </p>
                <div class="col-8">
                    <a href="./contacto.php">
                        <button  class="btn btn-lg">¡Contactanos!</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include("pie.php"); ?>
</html>