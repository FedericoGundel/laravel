@extends('layouts.master-without-nav')
@section('title')Sign In @endsection
@section('content')

<div class="auth-page d-flex align-items-center min-vh-100">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="d-flex flex-column h-100 py-5 px-4">
                    <div class="text-center text-muted mb-2">
                        <div class="pb-3">
                            <a href="{{ url('index') }}">
                                <span class="logo-lg">
                                    <img src="{{ URL::asset('assets/images/logo-bg-white3.png') }}" alt="" height="180">
                                </span>
                            </a>
                            <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0">Plataforma de gestión empresarial
                            </p>
                        </div>
                    </div>

                    <div class="my-auto">
                        <div class="p-3 text-center">
                            <img src="{{URL::asset('assets/images/auth-img3.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>

                    <div class="mt-4 mt-md-5 text-center">
                        <p class="mb-0">©«Financiado por la Unión Europea – NextGenerationEU. Sin embargo, los
                            puntos de vista y las opiniones expresadas son únicamente los del autor o autores y
                            no reflejan necesariamente los de la Unión Europea o la Comisión Europea. Ni la
                            Unión Europea ni la Comisión Europea pueden ser consideradas responsables de las
                            mismas»</p>
                    </div>

                </div>

                <!-- end auth full page content -->
            </div>
            <!-- end col -->

            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg bg-light py-md-5 p-4 d-flex">
                    <div class=""></div>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center g-0 align-items-center w-100">
                        <div class="col-xl-4 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="py-3">
                                        <div class="text-center">
                                            <h5 class="mb-0">Bienvenido !</h5>
                                            <p class="text-muted mt-2">Inicia sesión para acceder a la plataforma</p>
                                        </div>
                                        <form method="POST" action="{{ route('login') }}" class="mt-4 pt-2">
                                            @csrf


                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="text" id="username" placeholder="Ingresa nombre de usuario"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    name="username"
                                                    value="{{ old('username', request()->cookie('username')) }}"
                                                    required autocomplete="username" autofocus>
                                                <label for="input-username">{{ __('Nombre de usuario') }}</label>
                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-users-alt"></i>
                                                </div>
                                            </div>

                                            <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="Ingresa tu contraseña"
                                                    value="{{ old('password', request()->cookie('password')) }}">
                                                <button type="button"
                                                    class="btn btn-link position-absolute h-100 end-0 top-0"
                                                    id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                                <label for="password-input">{{ __('Contraseña') }}</label>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-padlock"></i>
                                                </div>
                                            </div>

                                            <div class="form-check form-check-primary font-size-16 py-1">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <div class="float-end d-none">
                                                    @if (Route::has('password.request'))
                                                    <a href="#"
                                                        class="text-muted text-decoration-underline font-size-14">{{ __('Olvidaste tu contraseña?') }}</a>
                                                    @endif
                                                </div>
                                                <label class="form-check-label font-size-14" for="remember-check">
                                                    {{ __('Recordarme') }}
                                                </label>
                                            </div>

                                            <div class="mt-3">
                                                <button class="btn btn-primary w-100"
                                                    type="submit">{{ __('Iniciar sesión') }}</button>
                                            </div>



                                            <div class="mt-4 pt-3 text-center">
                                                <p class="text-muted mb-0">No tienes una cuenta aún? <a
                                                        href="{{ route('register') }}"
                                                        class="fw-semibold text-decoration-underline"> Registrarme </a>
                                                </p>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>
@endsection
<style>
.invalid-feedback {
    position: absolute;
}
</style>

@section('script')

<script>
document.getElementById('password-addon').addEventListener('click', function() {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
});
</script>
@endsection