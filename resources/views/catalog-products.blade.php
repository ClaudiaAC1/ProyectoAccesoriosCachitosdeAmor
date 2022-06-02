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
                    <li class="nav-item px-4"><a class="nav-link" href="{{route('catalogo')}}">CATALOGO</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('auth.login')}}">INGRESAR</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--header-->
	<header id="header" class="masthead header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="mid-section main-info-area">
						<div class="wrap-search center-section">
							<div class="wrap-search-form" style="color: blue;">
								<form action="#" id="form-search-top" name="form-search-top">
									<input type="text" name="search" value="" placeholder="Search here..." >
									<button form="form-search-top" type="button" ><i class="fa fa-search" aria-hidden="true"></i></button>
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

    <main id="main">
    <div class="container">
        <!--MAIN SLIDE-->
			<div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
					<div class="item-slide">
						<img src="assets/images/main-slider-1-1.jpg" alt="" class="img-slide">
						<div class="slide-info slide-1">
							<h2 class="f-title">Kid Smart <b>Watches</b></h2>
							<span class="subtitle">Compra todos tus productos Smart por internet.</span>
							<p class="sale-info">Only price: <span class="price">$59.99</span></p>
							<a href="#" class="btn-link">Shop Now</a>
						</div>
					</div>

                    <div class="item-slide">
						<img src="assets/images/main-slider-1-2.jpg" alt="" class="img-slide">
						<div class="slide-info slide-2">
							<h2 class="f-title">Extra 25% Off</h2>
							<span class="f-subtitle">On online payments</span>
							<p class="discount-code">Use Code: #FA6868</p>
							<h4 class="s-title">Get Free</h4>
							<p class="s-subtitle">TRansparent Bra Straps</p>
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
</body>

</html>