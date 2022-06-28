<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>

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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/color-01.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chosen.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css')}}">

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container px-5">
            <a class="navbar-brand" href="#page-top">❤️ACCESORIOS CACHITOS DE AMOR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-4"><a class="nav-link" href="{{route('auth.logout')}}">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('auth.login')}}">INGRESAR</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--header-->
    <header id="header" class="masthead header header-style-1 py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="mid-section main-info-area">
                        <div class="wrap-search center-section py-2">
                            <div class="wrap-search-form" style="color: blue;">
                                <form action="#" id="form-search-top" name="form-search-top">
                                    <input type="text" name="search" value="" placeholder="Buscar...">
                                    <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    <div class="wrap-list-cate">
                                        <input type="hidden" name="product-cate" value="0" id="product-cate">
                                        <a href="#" class="link-control">Categorias</a>
                                        <ul class="list-cate">
                                            @foreach($categories as $c)
                                            <li class="level-0">{{$c->nombre}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </header>

    <main id="main" class="py-3">
        <div class="container">
            <!--MAIN SLIDE-->
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" style="text-align: center;">

                    @foreach ($productos as $p)

                    <div class="carousel-item @if($p->id == 1 ) active @endif" data-bs-interval="5000" >
                        <img src="{{asset('img/collage2.png')}}" class=" w-100  col-auto" alt="..." style="background-size: cover;
                                     height:30rem; ">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>.... </h5>
                            <p>.....</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!--Product Categories-->
            <div class="wrap-show-advance-info-box style-1">

                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-control">
                            @foreach($categories as $c)
                            <a href="#{{$c->id}}" class="tab-control-item @if($c -> id == 1) active @endif">{{$c->nombre}}</a>
                            @endforeach

                        </div>
                        <div class="tab-contents">
                            @foreach($categories as $c )
                            <div class="tab-content-item @if($c -> id == 1) active @endif" id="{{$c->id}}">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    @foreach($c->products as $p)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{asset('storage/'.$p->url_img)}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                                <!--ETIQUETAS -->
                                            </div>
                                            <!-- <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>ETIQUETAS
                                        </div> -->
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>{{$p->nombre}}</span></a>
                                            <div class="wrap-price"><span class="product-price">${{$p->precio}}</span></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </main>



    <!-- Footer-->
    <footer class="py-5 bg-black">
        <div class="container px-5">
            <p class="m-0 text-center text-white small">Copyright &copy; Accesorios Cachitos de Amor 2022. Contacto: cachitosdeamor@pedidos.com</p>
            <p class="m-0 text-center text-white small"><IMG SRC="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/1365px-Facebook_f_logo_%282019%29.svg.png" width="25" height="25">
                Facebook: Cachitos de amor&nbsp&nbsp&nbsp&nbsp
                <IMG SRC="https://www.mexmads.com/wp-content/uploads/2016/08/Instagram-logo.png" width="25" height="25">
                Instagram: @CachitosdeAmor
            </p>
            <p class="m-0 text-center text-white small">Derechos reservados TeamCIREA &copy; 😀</p>
        </div>
    </footer>
    <!--  -->



    <script src="{{ asset('js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
    <script src="{{ asset('js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.flexslider.js')}}"></script>
    <script src="{{ asset('js/chosen.jquery.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('js/jquery.sticky.js')}}"></script>
    <script src="{{ asset('js/functions.js')}}"></script>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js')}}"></script>
</body>

</html>