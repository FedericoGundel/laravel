@extends('layouts.master-without-nav')
@section('title')Signup @endsection
@section('content')

<div class="auth-bg-basic d-flex align-items-center min-vh-100">
    <div class="bg-overlay bg-light"></div>
    <div class="container pt-5">
        <div class="d-flex flex-column min-vh-100 py-5 px-3">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="text-center text-muted">
                        <div class="">
                            <a href="{{ url('index') }}">
                                <span class="logo-lg">
                                    <img src="{{ URL::asset('assets/images/logo-bg-white23.png') }}" alt=""
                                        height="120">
                                </span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center my-auto">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-transparent shadow-none border-0">

                        <div class="card-body">
                            <div class="py-3">
                                <div class="text-center">
                                    <h5 class="mb-0">Registrar nuevo usuario</h5>
                                    <p class="text-muted mt-2">A continuación, ingresa los datos requeridos para crear
                                        tu cuenta</p>
                                </div>

                                <form id="form-registrar" method="POST" action="{{ route('add-solicitud-admision') }}"
                                    class="mt-4 pt-2">

                                    @csrf


                                    <div class="form-floating form-floating-custom mb-3">
                                        <input type="text" id="username" placeholder="Ingresa nombre de usuario"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus>
                                        <label for="input-username">{{ __('Nombre de usuario') }}</label>

                                        <span id="alerta_username" style="display:none;" class="invalid-feedback"
                                            role="alert">
                                            <strong></strong>
                                        </span>

                                        <div class="form-floating-icon">
                                            <i class="uil uil-users-alt"></i>
                                        </div>
                                    </div>

                                    <div class="form-floating form-floating-custom mb-3">
                                        <input type="password" id="password" placeholder="Ingresa la contraseña"
                                            class="form-control" name="password" required autocomplete="new-password">
                                        <label for="input-password">{{ __('Contraseña') }}</label>

                                        <span id="alerta_password" style="display:none;" class="invalid-feedback"
                                            role="alert">
                                            <strong></strong>
                                        </span>

                                        <div class="form-floating-icon">
                                            <i class="uil uil-padlock"></i>
                                        </div>
                                    </div>

                                    <div class="form-floating form-floating-custom mb-3">
                                        <input type="password" id="password-confirm"
                                            placeholder="Confirma la contraseña" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                        <label for="password-confirm">{{ __('Confirma la contraseña') }}</label>

                                        <div class="form-floating-icon">
                                            <i class="uil uil-padlock"></i>
                                        </div>
                                    </div>

                                    <div class="py-1">
                                        <p class="mb-0">Al registrarte a Kit Digital estas de acuerdo con nuestros <a
                                                href="#" class="text-primary">términos de uso</a></p>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100"
                                            type="submit">{{ __('Registrarme') }}</button>
                                    </div>


                                    <div class="mt-4 pt-3 text-center">
                                        <p class="text-muted mb-0">Ya tienes una cuenta? <a href="{{ route('login') }}"
                                                class="fw-semibold text-decoration-underline"> Incia sesión </a> </p>
                                    </div>

                                </form><!-- end form -->
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- end row -->
            <div class="row d-none">
                <div class="col-xl-12">
                    <div class="text-center">
                        <p class="mb-0">©«Financiado por la Unión Europea – NextGenerationEU. Sin embargo, los
                            puntos de vista y las opiniones expresadas son únicamente los del autor o autores y
                            no reflejan necesariamente los de la Unión Europea o la Comisión Europea. Ni la
                            Unión Europea ni la Comisión Europea pueden ser consideradas responsables de las
                            mismas»</p>
                    </div>
                </div>
            </div> <!-- end row -->
            <div class="row d-none">
                <div class="row d-none">
                    <div class="col-xl-12">
                        <div class="mt-4 mt-md-5 text-center">
                            <p class="mb-0">© <script>
                                document.write(new Date().getFullYear())
                                </script> Vuesy. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                            </p>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
        </div>
        <!-- end container fluid -->
    </div>
    <!-- end authentication section -->

    @endsection

    <script src="{{ URL::asset('assets/js/pages/register/index.js') }}"></script>