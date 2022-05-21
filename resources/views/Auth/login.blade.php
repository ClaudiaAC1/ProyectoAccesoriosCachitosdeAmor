@extends('Auth.master')

@section('title', 'Login')

@section('content')

<section class="vh-100" style="background-color: #55AE95;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-7 col-lg-5 d-none d-md-block">
                            <img src="https://cdn-icons-png.flaticon.com/512/5087/5087579.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form method="post" action="{{route('auth.authenticate')}}">
                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1 px-5">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <p class="h1 fw-bold mb-0 px-3 m-0" >¡Bienvenido! </p>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ya puedes iniciar sesión</h5>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example17">Correo Electrónico</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example27">Contraseña</label>
                                    </div>

                                    <div class="pt-1 mb-4 position-relative">
                                        <button class="btn btn-dark btn-lg btn-block position-absolute top-0 start-50 translate-middle" type="submit">Iniciar sesión</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                                <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Accesorios Cachitos de Amor 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
                </div>
                
            </div>
        </div>
    </div>
</section>

@endsection