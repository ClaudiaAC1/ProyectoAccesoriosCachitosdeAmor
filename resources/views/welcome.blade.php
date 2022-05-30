<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesorios Cachitos de Amor</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
</head>

<body>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container px-5">
            <a class="navbar-brand" href="#page-top">❤️ACCESORIOS CACHITOS DE AMOR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-4"><a class="nav-link" href="#">CATALOGO</a></li>
                    <li class="nav-item px-4"><a class="nav-link" href="#">NOSOTROS</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('auth.login')}}">INGRESAR</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5 py-1">
                <h1 class="masthead-heading mb-0">TRABAJAMOS PARA RESALTAR TU BELLEZA</h1>
                <img src="{{ asset('img/logo.jpg')}}" alt="" style="border-radius:150px;  width:300px; height:300px;">
                <br>
                <a class="btn btn-primary btn-xl rounded-pill mt-5 p-4" href="#scroll">Leer más</a>
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </header>
    <!-- Content section 1-->
    <section id="scroll">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-4"><img class="img-fluid rounded-circle" src="{{asset('img/collage2.png')}}" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">¿Quiénes somos?</h2>
                        <p style="text-align:justify">Somos una tienda de accesorios dedicada a la venta de los mejores productos que
                            te haran lucir radiante en cualquier temporada siempre caminando de la mano con las nuevas tendencias.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 2-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class=""><img class="img-fluid rounded-circle" src="{{asset('img/Aretes h.jpg')}}" alt="..." /></div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">¡¡De todo un poco!!</h2>
                        <p style="text-align:justify">Realizamos trabajos como <br>
                            🔸Aretes <br>
                            🔸Pulseras <br>
                            🔸Collares <br>
                            🔸Llaveros <br>
                            🔸Accesorios aesthetic <br>
                            Todo esto con técnicas que permiten un trabajo limpio y hermoso🤗🌼.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 3-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-4"><img class="img-fluid rounded-circle" src="https://blog.wasi.co/wp-content/uploads/2019/12/redes-sociales-de-la-agencia-inmobiliaria.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">¡Conócenos!</h2>
                        <i class="bi bi-instagram"></i>
                        <p style="text-align:justify">Visita nuestras redes sociales, en las cuales puedes encontrar distintas 
                        dinámicas para ganarte fabulosos premios y descuentos.</p>
                        <p style="text-align:center"><b>¡Comparte y gana!</b></p>
                        <p style="text-align:justify"> *Promoción válida este verano 2022.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-black">
        <div class="container px-5">
            <p class="m-0 text-center text-white small">Copyright &copy; Accesorios Cachitos de Amor 2022. Contacto: cachitosdeamor@pedidos.com</p>
            <p class="m-0 text-center text-white small"><IMG SRC="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/1365px-Facebook_f_logo_%282019%29.svg.png"  width="25" height="25" >
            Facebook: Cachitos de amor&nbsp&nbsp&nbsp&nbsp
            <IMG SRC="https://www.mexmads.com/wp-content/uploads/2016/08/Instagram-logo.png"  width="25" height="25" >
            Instagram: @CachitosdeAmor </p>
            <p class="m-0 text-center text-white small">Derechos reservados TeamCIREA &copy; 😀</p>
        </div>
    </footer>
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js')}}"></script>
</body>

</html>