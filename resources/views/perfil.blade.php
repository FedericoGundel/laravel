@extends('layouts.master')

@section('title')Settings @endsection

@section('css')

<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">

<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">

@endsection

@section('content')

{{-- breadcrumbs  --}}

@section('breadcrumb')

@component('components.breadcrumb')

@slot('li_1') Contacts @endslot

@slot('title') Settings @endslot

@endcomponent

@endsection

<div class="row">

    <div class="col-xxl-3 col-lg-4">

        <div class="card h-100 mb-3">

            <div class="card-body p-0">

                <div class="user-profile-img">

                    <img src="{{URL::asset('assets/images/bg_log.png')}}"
                        class="profile-img profile-foreground-img rounded-top" style="height: 120px;" alt="">

                    <div class="overlay-content rounded-top">

                        <div>

                            <div class="user-nav p-3">

                                <div class="d-flex justify-content-end">

                                    <div class="dropdown">

                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">

                                            <i class="bx bx-dots-horizontal font-size-20 text-white"></i>

                                        </a>



                                        <ul class="dropdown-menu dropdown-menu-end">

                                            <li class="d-none"><a class="dropdown-item" type="button">Cambiar foto de
                                                    portada</a></li>

                                            <li><a class="dropdown-item" type="button" id="btn_cambiar_perfil">Cambiar
                                                    foto de perfil</a>
                                                <input type="file" id="input_archivo" accept=".png" class="d-none" />
                                            </li>



                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- end user-profile-img -->



                <div class="mt-n5 position-relative">

                    <div class="text-center">

                        <img id="img_user"
                            src="/assets/images/profile_images/{{ ($user->profile_image != 0) ? $user->id . '.png' : 'default.svg' }}"
                            alt="" class="avatar-xl rounded-circle img-thumbnail">



                        <div class="mt-2">

                            <h5 class="mb-1">{{ $user->username }}</h5>







                        </div>



                    </div>

                </div>







                <div class="p-3 mt-2">

                    <h5 class="">Información:</h5>



                    <div class="mt-2">

                        <p class="text-muted mb-1">Nombre :</p>

                        <h5 data-malleable='true' data-ma-enter='submit' data-ma-blur="submit" style="cursor: pointer;"
                            data-atributo="nombre" class="editable font-size-14 text-truncate">{{ $user->nombre }}
                        </h5>


                    </div>
                    <style>
                    .editable::after {
                        content: "\f044";
                        /* Código Unicode para el ícono de editar de FontAwesome */
                        font-family: Font Awesome\ 5 Free;
                        /* Asegúrate de que este sea el nombre de la fuente de FontAwesome que estás usando */
                        font-weight: 900;
                        /* Para los íconos de FontAwesome, el peso de la fuente suele ser 900 */
                        margin-left: 8px;
                        /* Espacio entre el texto y el ícono */
                        display: inline-block;
                        /* Asegúrate de que el ícono se alinee correctamente con el texto */
                        font-size: 14px;
                        /* Tamaño del ícono */
                        color: #4b9e44;
                        /* Color del ícono (puedes ajustarlo según tu diseño) */
                        float: right;
                    }

                    .editable2::after {
                        content: "\f044";
                        /* Código Unicode para el ícono de editar de FontAwesome */
                        font-family: Font Awesome\ 5 Free;
                        /* Asegúrate de que este sea el nombre de la fuente de FontAwesome que estás usando */
                        font-weight: 900;
                        /* Para los íconos de FontAwesome, el peso de la fuente suele ser 900 */
                        margin-left: 8px;
                        /* Espacio entre el texto y el ícono */
                        display: inline-block;
                        /* Asegúrate de que el ícono se alinee correctamente con el texto */
                        font-size: 16px;
                        /* Tamaño del ícono */
                        color: #4b9e44;

                    }
                    </style>


                    <div class="mt-2">

                        <p class="text-muted mb-1">E-mail :</p>

                        <h5 data-malleable='true' data-ma-enter='submit' data-ma-blur="submit" style="cursor: pointer;"
                            data-atributo="email" class="editable font-size-14 text-truncate">{{ $user->email }}
                        </h5>

                    </div>
                    <div class="mt-2">

                        <p class="text-muted mb-1">CIF :</p>

                        <h5 data-malleable='true' data-ma-enter='submit' data-ma-blur="submit" style="cursor: pointer;"
                            data-atributo="cif" class="editable font-size-14 text-truncate">{{ $user->cif }}
                        </h5>

                    </div>
                    <div class="mt-2">

                        <p class="text-muted mb-1">Teléfono:</p>

                        <h5 data-malleable='true' data-ma-enter='submit' data-ma-blur="submit" style="cursor: pointer;"
                            data-atributo="telefono" class="editable font-size-14 text-truncate">{{ $user->telefono }}
                        </h5>

                    </div>



                    <div class="mt-2">

                        <p class="text-muted mb-1">Fecha de registro :</p>

                        <h5 class="font-size-14 text-truncate">2024-03-15</h5>

                    </div>

                </div>



            </div>

            <!-- end card body -->

        </div>

    </div>

    <!-- end col -->



    <div class="col-xxl-9 col-lg-8">

        <div class="card h-100 mb-3">

            <div class="card-header justify-content-between d-flex align-items-center">

                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab" aria-selected="true">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Seguridad</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab" aria-selected="false"
                            tabindex="-1">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Permisos</span>
                        </a>
                    </li>
                    <li class="nav-item d-none" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab" aria-selected="false"
                            tabindex="-1">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">Messages</span>
                        </a>
                    </li>
                    <li class="nav-item d-none" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab" aria-selected="false"
                            tabindex="-1">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">Settings</span>
                        </a>
                    </li>
                </ul>

            </div>

            <div class="card-body">

                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="home1" role="tabpanel">

                        <h5 for="my-input">Nombre de usuario</h5>


                        <p data-malleable='true' data-ma-enter='submit' data-ma-blur="submit"
                            style="font-size: 16px;cursor: pointer;" data-atributo="username" class="editable2">
                            {{ $user->username }}
                        </p>



                        <h5 for="my-input">Cambiar contraseña</h5>
                        <div class="form-floating input-pass form-floating-custom mb-3 auth-pass-inputgroup">
                            <input id="password2" type="password" class="form-control " name="password" required=""
                                autocomplete="current-password" placeholder="Ingresa tu contraseña">
                            <button type="button" class="py-0 btn btn-link position-absolute h-100 end-0 top-0"
                                id="password-addon2">
                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                            </button>

                            <div class="form-floating-icon">
                                <i class="uil uil-padlock"></i>
                            </div>
                            <div data-lastpass-icon-root=""
                                style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                            </div>
                        </div>

                        <div class="form-floating input-pass form-floating-custom mb-3 auth-pass-inputgroup">
                            <input id="password" type="password" class="form-control " name="password" required=""
                                autocomplete="current-password" placeholder="Ingresa tu contraseña">
                            <button type="button" class="py-0 btn btn-link position-absolute h-100 end-0 top-0"
                                id="password-addon">
                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                            </button>

                            <div class="form-floating-icon">
                                <i class="uil uil-padlock"></i>
                            </div>
                            <div data-lastpass-icon-root=""
                                style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                            </div>
                        </div>
                        <button id="btn_cambiar_pass" class="btn btn-primary">Cambiar</button>

                    </div>
                    <style>
                    .input-pass>.form-control {
                        height: 38.6px !important;

                        padding: .47rem .75rem !important;
                        padding-left: 45px !important;
                    }

                    .input-pass .form-floating-icon {
                        font-size: 18px !important;
                    }

                    .input-pass .form-floating-icon {
                        width: 45px !important;
                    }
                    </style>
                    <div class="tab-pane" id="profile1" role="tabpanel">
                        <div class="form-group">
                            <label for="my-input">Rol</label>
                            <form id="form-cambiar-rol" action="{{ route('perfil.set-role') }}"
                                class="row gx-3 gy-2 align-items-center">
                                @csrf
                                <div class="col">



                                    <select class="form-select" id="rol_user">

                                        @foreach($roles as $rol)
                                        <option value="{{ $rol->id }}" @if($rol->default) selected @endif>
                                            {{ $rol->name }}
                                        </option>
                                        @endforeach


                                    </select>

                                </div>



                                <!-- end col -->

                                <div class="col-auto">

                                    <button type="submit" class="btn btn-primary">Cambiar rol</button>

                                </div>

                                <!-- end col -->

                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="messages1" role="tabpanel">
                        <p class="mb-0">
                            Etsy mixtape wayfarers, ethical wes anderson tofu before they
                            sold out mcsweeney's organic lomo retro fanny pack lo-fi
                            farm-to-table readymade. Messenger bag gentrify pitchfork
                            tattooed craft beer, iphone skateboard locavore carles etsy
                            salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                            Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                            mi whatever gluten-free carles.
                        </p>
                    </div>
                    <div class="tab-pane" id="settings1" role="tabpanel">
                        <p class="mb-0">
                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                            art party before they sold out master cleanse gluten-free squid
                            scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                            art party locavore wolf cliche high life echo park Austin. Cred
                            vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                            farm-to-table VHS viral locavore cosby sweater, mustache readymade keffiyeh craft.
                        </p>
                    </div>
                </div>





            </div>

            <!-- end card body -->

        </div>

    </div>

    <div class="card d-none">

        <div class="card-body">

            <h5 class="card-title mb-3">Setting</h5>

            <form>

                <div class="card border shadow-none mb-5">

                    <div class="card-header d-flex align-items-center">

                        <div class="flex-shrink-0 me-3">

                            <div class="avatar">

                                <div class="avatar-title rounded-circle bg-primary-subtle text-primary">

                                    01

                                </div>

                            </div>

                        </div>

                        <div class="flex-grow-1">

                            <h5 class="card-title">General Info</h5>

                        </div>

                    </div>

                    <div class="card-body">

                        <div>



                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="mb-3">

                                        <label class="form-label" for="gen-info-name-input">Name</label>

                                        <input type="text" class="form-control" id="gen-info-name-input"
                                            placeholder="Enter Name">

                                    </div>



                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3">

                                        <label class="form-label" for="gen-info-designation-input">Designation</label>

                                        <input type="text" class="form-control" id="gen-info-designation-input"
                                            placeholder="Enter Designation">

                                    </div>

                                </div>

                            </div>



                            <div class="mb-3">

                                <label class="form-label" for="gen-info-description-input">Description</label>

                                <textarea class="form-control" placeholder="Enter Description"
                                    id="gen-info-description-input" rows="3"></textarea>

                            </div>



                            <div class="form-check mb-3" data-bs-toggle="collapse"
                                data-bs-target="#collapseChangePassword" aria-expanded="false"
                                aria-controls="collapseChangePassword">

                                <input type="checkbox" class="form-check-input" id="gen-info-change-password">

                                <label class="form-check-label" for="gen-info-change-password">Change

                                    passowrd?</label>

                            </div>



                            <div class="collapse" id="collapseChangePassword">

                                <div class="card border shadow-none card-body">

                                    <div class="row">

                                        <div class="col-lg-4">

                                            <div class="mb-lg-0">

                                                <label for="current-password-input" class="form-label">Current

                                                    password</label>

                                                <input type="password" class="form-control"
                                                    placeholder="Enter Current password" id="current-password-input">

                                            </div>

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="mb-lg-0">

                                                <label for="new-password-input" class="form-label">New

                                                    password</label>

                                                <input type="password" class="form-control"
                                                    placeholder="Enter New password" id="new-password-input">

                                            </div>

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="mb-lg-0">

                                                <label for="confirm-password-input" class="form-label">Confirm

                                                    password</label>

                                                <input type="password" class="form-control"
                                                    placeholder="Enter Confirm password" id="confirm-password-input">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>





                            <div>

                                <label for="choices-multiple-skill-input" class="form-label">Skills</label>

                                <select class="form-control" name="choices-multiple-skill-input"
                                    id="choices-multiple-skill-input" multiple>

                                    <option value="Photoshop" selected>Photoshop</option>

                                    <option value="illustrator" selected>illustrator</option>

                                    <option value="HTML">HTML</option>

                                    <option value="CSS">CSS</option>

                                    <option value="Javascript">Javascript</option>

                                    <option value="Php">Php</option>

                                    <option value="Python">Python</option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- end card -->



                <div class="card border shadow-none mb-5">

                    <div class="card-header d-flex align-items-center">

                        <div class="flex-shrink-0 me-3">

                            <div class="avatar">

                                <div class="avatar-title rounded-circle bg-primary-subtle text-primary">

                                    02

                                </div>

                            </div>

                        </div>

                        <div class="flex-grow-1">

                            <h5 class="card-title">Contact Info</h5>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="mb-3">

                            <label for="contact-info-email-input">E-mail :</label>

                            <input type="email" class="form-control" id="contact-info-email-input"
                                placeholder="Enter Email">

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="mb-md-0">

                                    <label for="contact-info-website-input" class="form-label">Website</label>

                                    <input type="url" class="form-control" placeholder="Enter website url"
                                        id="contact-info-website-input">

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="mb-md-0">

                                    <label for="contact-info-location-input" class="form-label">Location</label>

                                    <input type="url" class="form-control" placeholder="Enter Address"
                                        id="contact-info-location-input">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- end card -->



                <div class="card border shadow-none">

                    <div class="card-header d-flex align-items-center">

                        <div class="flex-shrink-0 me-3">

                            <div class="avatar">

                                <div class="avatar-title rounded-circle bg-primary-subtle text-primary">

                                    03

                                </div>

                            </div>

                        </div>

                        <div class="flex-grow-1">

                            <h5 class="card-title">Experience</h5>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label for="workexperience-designation-input">Designation</label>

                                    <input type="text" class="form-control" id="workexperience-designation-input"
                                        placeholder="Enter Designation title">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label for="workexperience-companyname-input">Company name</label>

                                    <input type="text" class="form-control" id="workexperience-companyname-input"
                                        placeholder="Enter Company name">

                                </div>

                            </div>

                        </div>





                        <div>

                            <label>Years</label>

                            <input type="text" class="form-control" id="datepicker-range">

                        </div>

                    </div>

                </div>

                <!-- end card -->



                <div class="text-end">

                    <button type="submit" class="btn btn-primary w-sm">Submit</button>

                </div>

            </form>

            <!-- end form -->

        </div>

        <!-- end card body -->

    </div>

    <!-- end card -->

</div>

<!-- end col -->

</div>

<!-- end row -->



@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
var form = document.getElementById("form-cambiar-rol");
console.log(form);
form.addEventListener("submit", (event) => {
    event.preventDefault();

    // Obtener la acción del formulario
    var action = form.action;





    var token = form.querySelector('input[name="_token"]').value
    fetch(action, {
            method: "PUT",

            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                Accept: "application/json"
            },
            body: JSON.stringify({
                user_id: "{{ $user->id }}",
                role_id: document.getElementById("rol_user").value,
                _token: token,
            })
        })
        .then((response) => {
            console.log(response);
            return response.json();
        })
        .then((data) => {
            // Manejar la respuesta JSON
            console.log(data);

            if (!data.success) {
                for (var atributo in data.errors) {
                    if (data.errors.hasOwnProperty(atributo)) {
                        data.errors[atributo].forEach(function(
                            elemento,
                            indice
                        ) {
                            iziToast.show({
                                title: "Problema de validación!",
                                titleSize: "",
                                titleLineHeight: "",
                                titleColor: "#ffffff",
                                message: elemento,
                                messageSize: "",
                                messageLineHeight: "",
                                messageColor: "#ffffff",
                                backgroundColor: "#e1665d",
                                theme: "light", // dark
                                color: "", // blue, red, green, yellow
                                icon: "fas fa-times-circle icono-toast",
                                iconColor: "#ffffff",
                                timeout: 7000,
                                position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                                transitionIn: "fadeInUp",
                                transitionOut: "fadeOut",
                                transitionInMobile: "fadeInUp",
                                transitionOutMobile: "fadeOutDown",
                                layout: 2,
                                maxWidth: "400px",
                                onOpening: function(
                                    instance,
                                    toast
                                ) {
                                    toast.querySelector(
                                            ".icono-toast"
                                        ).style.fontSize =
                                        "20px"; // Cambiar el tamaño del icono
                                },
                                onClosed: function() {},
                            });
                        });
                    }
                }
            } else {
                iziToast.show({
                    title: "Exitoso!",
                    titleSize: "",
                    titleLineHeight: "",
                    titleColor: "#ffffff",
                    message: data.message,
                    messageSize: "",
                    messageLineHeight: "",
                    messageColor: "#ffffff",
                    backgroundColor: "#6dcba3",
                    theme: "light", // dark
                    color: "", // blue, red, green, yellow
                    icon: "fa fa-check icono-toast",
                    iconColor: "#ffffff",
                    timeout: 7000,
                    position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                    transitionIn: "fadeInUp",
                    transitionOut: "fadeOut",
                    transitionInMobile: "fadeInUp",
                    transitionOutMobile: "fadeOutDown",
                    layout: 2,
                    maxWidth: "400px",
                    onOpening: function(instance, toast) {
                        toast.querySelector(
                            ".icono-toast"
                        ).style.fontSize = "20px"; // Cambiar el tamaño del icono
                    },
                    onClosed: function() {},
                });



            }
            // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
        })
        .catch((error) => {
            // Manejar los errores
            console.error("Error:", error);
            // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
        });
});
</script>
<script>
(function($) {
    'use strict';
    $(document).ready(function() {
        document.addEventListener('ValorIncorrecto', (event) => {
            iziToast.show({
                title: "Problema de validación!",
                titleSize: "",
                titleLineHeight: "",
                titleColor: "#ffffff",
                message: event.detail.mensaje,
                messageSize: "",
                messageLineHeight: "",
                messageColor: "#ffffff",
                backgroundColor: "#e1665d",
                theme: "light", // dark
                color: "", // blue, red, green, yellow
                icon: "fas fa-times-circle icono-toast",
                iconColor: "#ffffff",
                timeout: 7000,
                position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                transitionIn: "fadeInUp",
                transitionOut: "fadeOut",
                transitionInMobile: "fadeInUp",
                transitionOutMobile: "fadeOutDown",
                layout: 2,
                maxWidth: "400px",
                onOpening: function(
                    instance,
                    toast
                ) {
                    toast.querySelector(
                            ".icono-toast"
                        ).style.fontSize =
                        "20px"; // Cambiar el tamaño del icono
                },
                onClosed: function() {},
            });
        })
        document.addEventListener('DatosCambiados', (event) => {

            var token = form.querySelector('input[name="_token"]').value
            fetch("{{ route('perfil.edit-user') }}", {
                    method: "PUT",

                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        Accept: "application/json"
                    },
                    body: JSON.stringify({
                        user_id: "{{ $user->id }}",
                        atributo: event.detail.atributo,
                        valor: event.detail.value,
                        _token: token,
                    })
                })
                .then((response) => {
                    console.log(response);
                    return response.json();
                })
                .then((data) => {
                    // Manejar la respuesta JSON
                    console.log(data);

                    if (!data.success) {
                        for (var atributo in data.errors) {
                            if (data.errors.hasOwnProperty(atributo)) {
                                data.errors[atributo].forEach(function(
                                    elemento,
                                    indice
                                ) {
                                    iziToast.show({
                                        title: "Problema de validación!",
                                        titleSize: "",
                                        titleLineHeight: "",
                                        titleColor: "#ffffff",
                                        message: elemento,
                                        messageSize: "",
                                        messageLineHeight: "",
                                        messageColor: "#ffffff",
                                        backgroundColor: "#e1665d",
                                        theme: "light", // dark
                                        color: "", // blue, red, green, yellow
                                        icon: "fas fa-times-circle icono-toast",
                                        iconColor: "#ffffff",
                                        timeout: 7000,
                                        position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                                        transitionIn: "fadeInUp",
                                        transitionOut: "fadeOut",
                                        transitionInMobile: "fadeInUp",
                                        transitionOutMobile: "fadeOutDown",
                                        layout: 2,
                                        maxWidth: "400px",
                                        onOpening: function(
                                            instance,
                                            toast
                                        ) {
                                            toast.querySelector(
                                                    ".icono-toast"
                                                ).style.fontSize =
                                                "20px"; // Cambiar el tamaño del icono
                                        },
                                        onClosed: function() {},
                                    });
                                });
                            }
                        }
                    } else {
                        iziToast.show({
                            title: "Exitoso!",
                            titleSize: "",
                            titleLineHeight: "",
                            titleColor: "#ffffff",
                            message: data.message,
                            messageSize: "",
                            messageLineHeight: "",
                            messageColor: "#ffffff",
                            backgroundColor: "#6dcba3",
                            theme: "light", // dark
                            color: "", // blue, red, green, yellow
                            icon: "fa fa-check icono-toast",
                            iconColor: "#ffffff",
                            timeout: 7000,
                            position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                            transitionIn: "fadeInUp",
                            transitionOut: "fadeOut",
                            transitionInMobile: "fadeInUp",
                            transitionOutMobile: "fadeOutDown",
                            layout: 2,
                            maxWidth: "400px",
                            onOpening: function(instance, toast) {
                                toast.querySelector(
                                        ".icono-toast"
                                    ).style.fontSize =
                                    "20px"; // Cambiar el tamaño del icono
                            },
                            onClosed: function() {},
                        });



                    }
                    // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
                })
                .catch((error) => {
                    // Manejar los errores
                    console.error("Error:", error);
                    // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
                });

        });


    });
})(jQuery);
</script>

<script>
document.getElementById('password-addon').addEventListener('click', function() {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
});
document.getElementById('password-addon2').addEventListener('click', function() {
    var passwordInput = document.getElementById("password2");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
});
document.getElementById('btn_cambiar_pass').addEventListener('click', function() {
    var passwordInput = document.getElementById("password").value;
    var passwordInput2 = document.getElementById("password2").value;
    if (passwordInput != passwordInput2) {
        iziToast.show({
            title: "Problema de validación!",
            titleSize: "",
            titleLineHeight: "",
            titleColor: "#ffffff",
            message: "Las contraseñas deben coincidir",
            messageSize: "",
            messageLineHeight: "",
            messageColor: "#ffffff",
            backgroundColor: "#e1665d",
            theme: "light", // dark
            color: "", // blue, red, green, yellow
            icon: "fas fa-times-circle icono-toast",
            iconColor: "#ffffff",
            timeout: 7000,
            position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
            transitionIn: "fadeInUp",
            transitionOut: "fadeOut",
            transitionInMobile: "fadeInUp",
            transitionOutMobile: "fadeOutDown",
            layout: 2,
            maxWidth: "400px",
            onOpening: function(
                instance,
                toast
            ) {
                toast.querySelector(
                        ".icono-toast"
                    ).style.fontSize =
                    "20px"; // Cambiar el tamaño del icono
            },
            onClosed: function() {},
        });
        return false
    } else {
        if (passwordInput.length < 8) {
            iziToast.show({
                title: "Problema de validación!",
                titleSize: "",
                titleLineHeight: "",
                titleColor: "#ffffff",
                message: "La contraseña debe tener al menos 8 caracteres.",
                messageSize: "",
                messageLineHeight: "",
                messageColor: "#ffffff",
                backgroundColor: "#e1665d",
                theme: "light", // dark
                color: "", // blue, red, green, yellow
                icon: "fas fa-times-circle icono-toast",
                iconColor: "#ffffff",
                timeout: 7000,
                position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                transitionIn: "fadeInUp",
                transitionOut: "fadeOut",
                transitionInMobile: "fadeInUp",
                transitionOutMobile: "fadeOutDown",
                layout: 2,
                maxWidth: "400px",
                onOpening: function(
                    instance,
                    toast
                ) {
                    toast.querySelector(
                            ".icono-toast"
                        ).style.fontSize =
                        "20px"; // Cambiar el tamaño del icono
                },
                onClosed: function() {},
            });
            return false
        } else {
            var token = form.querySelector('input[name="_token"]').value
            fetch("{{ route('perfil.edit-user') }}", {
                    method: "PUT",

                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        Accept: "application/json"
                    },
                    body: JSON.stringify({
                        user_id: "{{ $user->id }}",
                        atributo: "password",
                        valor: passwordInput,
                        _token: token,
                    })
                })
                .then((response) => {
                    console.log(response);
                    return response.json();
                })
                .then((data) => {
                    // Manejar la respuesta JSON
                    console.log(data);

                    if (!data.success) {
                        for (var atributo in data.errors) {
                            if (data.errors.hasOwnProperty(atributo)) {
                                data.errors[atributo].forEach(function(
                                    elemento,
                                    indice
                                ) {
                                    iziToast.show({
                                        title: "Problema de validación!",
                                        titleSize: "",
                                        titleLineHeight: "",
                                        titleColor: "#ffffff",
                                        message: elemento,
                                        messageSize: "",
                                        messageLineHeight: "",
                                        messageColor: "#ffffff",
                                        backgroundColor: "#e1665d",
                                        theme: "light", // dark
                                        color: "", // blue, red, green, yellow
                                        icon: "fas fa-times-circle icono-toast",
                                        iconColor: "#ffffff",
                                        timeout: 7000,
                                        position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                                        transitionIn: "fadeInUp",
                                        transitionOut: "fadeOut",
                                        transitionInMobile: "fadeInUp",
                                        transitionOutMobile: "fadeOutDown",
                                        layout: 2,
                                        maxWidth: "400px",
                                        onOpening: function(
                                            instance,
                                            toast
                                        ) {
                                            toast.querySelector(
                                                    ".icono-toast"
                                                ).style.fontSize =
                                                "20px"; // Cambiar el tamaño del icono
                                        },
                                        onClosed: function() {},
                                    });
                                });
                            }
                        }
                    } else {
                        iziToast.show({
                            title: "Exitoso!",
                            titleSize: "",
                            titleLineHeight: "",
                            titleColor: "#ffffff",
                            message: data.message,
                            messageSize: "",
                            messageLineHeight: "",
                            messageColor: "#ffffff",
                            backgroundColor: "#6dcba3",
                            theme: "light", // dark
                            color: "", // blue, red, green, yellow
                            icon: "fa fa-check icono-toast",
                            iconColor: "#ffffff",
                            timeout: 7000,
                            position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                            transitionIn: "fadeInUp",
                            transitionOut: "fadeOut",
                            transitionInMobile: "fadeInUp",
                            transitionOutMobile: "fadeOutDown",
                            layout: 2,
                            maxWidth: "400px",
                            onOpening: function(instance, toast) {
                                toast.querySelector(
                                        ".icono-toast"
                                    ).style.fontSize =
                                    "20px"; // Cambiar el tamaño del icono
                            },
                            onClosed: function() {},
                        });

                    }


                });
        }

    }


});

const uploadButton = document.getElementById('btn_cambiar_perfil');
const hiddenFileInput = document.getElementById('input_archivo');

// Añadir evento de click al botón
uploadButton.addEventListener('click', function() {
    // Simular clic en el input file oculto
    hiddenFileInput.click();
});

// Opcional: manejar la selección de archivos
hiddenFileInput.addEventListener('change', function() {
    console.log(hiddenFileInput.files[0]);
    const archivo = hiddenFileInput.files[0];
    const maxSize = 2 * 1024 * 1024
    if (archivo) {
        if (archivo.size > maxSize) {
            // Mostrar mensaje de error si el archivo es demasiado grande

            iziToast.show({
                title: "El archivo es demasiado grande.",
                titleSize: "",
                titleLineHeight: "",
                titleColor: "#ffffff",
                message: "El tamaño máximo es de 2 MB.",
                messageSize: "",
                messageLineHeight: "",
                messageColor: "#ffffff",
                backgroundColor: "#e1665d",
                theme: "light", // dark
                color: "", // blue, red, green, yellow
                icon: "fas fa-times-circle icono-toast",
                iconColor: "#ffffff",
                timeout: 7000,
                position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                transitionIn: "fadeInUp",
                transitionOut: "fadeOut",
                transitionInMobile: "fadeInUp",
                transitionOutMobile: "fadeOutDown",
                layout: 2,
                maxWidth: "400px",
                onOpening: function(instance, toast) {
                    toast.querySelector(
                        ".icono-toast"
                    ).style.fontSize = "20px"; // Cambiar el tamaño del icono
                },
                onClosed: function() {},
            });
            return false
        }
        var csrfToken = document.querySelector(
            'input[name="_token"]'
        ).value;
        var formDataToSend = new FormData();
        formDataToSend.append("archivo", archivo);
        formDataToSend.append("_token", csrfToken);
        formDataToSend.append("user_id", "{{ $user->id }}");
        var object2 = {};
        formDataToSend.forEach(function(value, key) {
            object2[key] = value;
        });
        var json2 = JSON.stringify(object2);

        fetch("{{ route('perfil.set-user-img') }}", {
                method: "POST",
                body: formDataToSend,
            })
            .then((response) => {
                console.log(response);
                return response.json();
            })
            .then((data) => {
                // Manejar la respuesta JSON
                console.log(data);
                if (!data.success) {
                    for (let a of data.errors.codigo) {
                        iziToast.show({
                            title: "Problema de validación!",
                            titleSize: "",
                            titleLineHeight: "",
                            titleColor: "#ffffff",
                            message: a,
                            messageSize: "",
                            messageLineHeight: "",
                            messageColor: "#ffffff",
                            backgroundColor: "#e1665d",
                            theme: "light", // dark
                            color: "", // blue, red, green, yellow
                            icon: "fas fa-times-circle icono-toast",
                            iconColor: "#ffffff",
                            timeout: 7000,
                            position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                            transitionIn: "fadeInUp",
                            transitionOut: "fadeOut",
                            transitionInMobile: "fadeInUp",
                            transitionOutMobile: "fadeOutDown",
                            layout: 2,
                            maxWidth: "400px",
                            onOpening: function(instance, toast) {
                                toast.querySelector(
                                    ".icono-toast"
                                ).style.fontSize = "20px"; // Cambiar el tamaño del icono
                            },
                            onClosed: function() {},
                        });
                    }
                } else {
                    iziToast.show({
                        title: "Exitoso!",
                        titleSize: "",
                        titleLineHeight: "",
                        titleColor: "#ffffff",
                        message: data.message,
                        messageSize: "",
                        messageLineHeight: "",
                        messageColor: "#ffffff",
                        backgroundColor: "#6dcba3",
                        theme: "light", // dark
                        color: "", // blue, red, green, yellow
                        icon: "fa fa-check icono-toast",
                        iconColor: "#ffffff",
                        timeout: 7000,
                        position: "topRight", // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                        transitionIn: "fadeInUp",
                        transitionOut: "fadeOut",
                        transitionInMobile: "fadeInUp",
                        transitionOutMobile: "fadeOutDown",
                        layout: 2,
                        maxWidth: "400px",
                        onOpening: function(instance, toast) {
                            toast.querySelector(
                                ".icono-toast"
                            ).style.fontSize = "20px"; // Cambiar el tamaño del icono
                        },
                        onClosed: function() {},
                    });

                    document.getElementById("img_user").src =
                        "/assets/images/profile_images/{{$user->id .'.png'}}?timestamp=" + new Date()
                        .getTime()
                    document.getElementById("img_user2").src =
                        "/assets/images/profile_images/{{$user->id .'.png'}}?timestamp=" + new Date()
                        .getTime()
                }
                // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
            })
            .catch((error) => {
                // Manejar los errores
                console.error("Error:", error);
                // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
            });

    } else {
        alert('Por favor, seleccione un archivo.');
    }
});
</script>







<script src="{{ URL::asset('js/app.js') }}"></script>



@endsection