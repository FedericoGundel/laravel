@extends('layouts.master')

@section('title')Advance Tables @endsection

@section('css')

<link href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}" rel="stylesheet" type="text/css" />

<link
    href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.css"
    rel="stylesheet">

@endsection

@section('content')

{{-- breadcrumbs  --}}

@section('breadcrumb')

@component('components.breadcrumb')

@slot('li_1') Tables @endslot

@slot('title') Advance Tables @endslot

@endcomponent

@endsection

<div class="row">

    <div class="col">



        <div class="card">

            <div class="card-body p-0">

                <div class="row row-cols-1">

                    <div class="col">



                        <div class="mt-md-0 py-3 px-4 mx-2">



                            <div class="d-flex flex-column align-items-center justify-content-center">

                                <lord-icon class="mb-2" src="https://cdn.lordicon.com/pjkwunvs.json" trigger="hover"
                                    colors="primary:#4b9e44,secondary:#454340" style="width:50px;height:50px">

                                </lord-icon>



                                <h3 id="roles_count" class="text-black mb-2"></h3>

                                <p class="text-black-50 mb-0 text-truncate">Roles

                                </p>

                            </div>

                        </div>

                    </div><!-- end col -->







                </div><!-- end row -->



            </div>



        </div>

    </div>

</div>

<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Roles creados</h4>

            </div><!-- end card header -->

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table w-100" id="tabla-roles" data-url="{{ route('get-roles') }}">

                        <thead>

                            <tr>

                                <th>ID</th>

                                <th>Nombre</th>



                                <th>Permisos</th>

                                <th>Acciones</th>

                            </tr>

                        </thead>

                        <tbody>

                            <!-- Aquí puedes agregar filas de datos si deseas, pero no es necesario para DataTables -->

                        </tbody>

                    </table>

                </div>








            </div>

            <!-- end card body -->

        </div>

        <!-- end card -->

    </div>

    <!-- end col -->

</div>
<div class="modal fade" id="modal-rol-defecto" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Configurar rol por defecto</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>



            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mb-0">
                            <label for="my-input">Este rol se asignara automáticamente a los nuevos usuarios.</label>
                            <select class="form-control" style="width: 100%" id="rol_defecto">

                            </select>
                        </div>


                    </div>
                </div>


            </div>

            <div class="modal-footer">
                <form method="POST" id="form-rol-defecto" action="default-role">
                    @csrf
                    <button type="submit" class="btn btn-success">Aceptar</button>

                </form><!-- end form -->

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
<div class="modal fade" id="modal-aregar-rol" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Agregar rol</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>

            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="nombre-rol">Nombre</label>
                    <input id="nombre-rol" class="form-control" type="text" name="">
                </div>
                <div class="table-responsive">

                    <table class="table w-100" id="tabla-permisos" data-url="get-permisos">

                        <thead>

                            <tr>


                                <th>Permiso</th>





                                <th>Acciones</th>

                            </tr>

                        </thead>

                        <tbody>

                            <!-- Aquí puedes agregar filas de datos si deseas, pero no es necesario para DataTables -->

                        </tbody>

                    </table>

                </div>



            </div>

            <div class="modal-footer">
                <form method="PUT" id="form-agregar-rol" action="store-roles">
                    @csrf
                    <button type="submit" class="btn btn-success">Aceptar</button>

                </form><!-- end form -->

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div>

<!-- end row -->
<div class="modal fade" id="modal-editar-rol" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Editar rol</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>

            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="nombre-rol-editar">Nombre</label>
                    <input id="nombre-rol-editar" class="form-control" type="text" name="">
                </div>
                <div class="table-responsive">

                    <table class="table w-100" id="tabla-permisos-editar" data-url="get-permisos">

                        <thead>

                            <tr>


                                <th>Permiso</th>





                                <th>Acciones</th>

                            </tr>

                        </thead>

                        <tbody>

                            <!-- Aquí puedes agregar filas de datos si deseas, pero no es necesario para DataTables -->

                        </tbody>

                    </table>

                </div>



            </div>

            <div class="modal-footer">
                <form method="PUT" id="form-editar-rol" action="edit-role">
                    @csrf
                    <button type="submit" class="btn btn-success">Editar</button>

                </form><!-- end form -->

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div>

<div class="modal fade modal-sm" id="modal-eliminar-rol" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Eliminar</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>

            </div>

            <div class="modal-body text-center text-center">

                <lord-icon class="mb-2" src="https://cdn.lordicon.com/rmkpgtpt.json" trigger="loop"
                    style="width:150px;height:150px" colors="primary:#4b9e44,secondary:#454340" delay="1000">

                </lord-icon>
                <p class="mb-0">Estás seguro de eliminar este elemento?</p>
            </div>

            <div class="modal-footer">
                <form method="POST" id="form-eliminar-rol" action="delete-role">
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>

                </form><!-- end form -->

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div>

@endsection

@section('script')

<script>
(function($) {
    'use strict';
    $("#rol_defecto").select2();
    getRoles()


    document.addEventListener('RolesCambiados', function(event) {
        getRoles()
    });

    function getRoles(id_rol = 1) {
        fetch("get-roles")
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                data = data.map(function(item) {

                    return {
                        id: item.id,
                        text: item.name,
                        nombre: item.name,
                        selected: item.default
                    };

                })

                $('#rol_defecto').empty();
                $('#rol_defecto').select2({
                    data: data
                }).trigger("change");
            })

    }
    var form = document.getElementById("form-rol-defecto");

    form.addEventListener("submit", (event) => {
        event.preventDefault();

        // Obtener la acción del formulario
        var action = form.action + "/" + $("#rol_defecto").val();

        console.log(action);



        const formData = new FormData(form);






        fetch(action, {
                method: "POST",
                body: formData,
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

                    bootstrap.Modal.getInstance('#modal-rol-defecto').hide();
                }
                // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
            })
            .catch((error) => {
                // Manejar los errores
                console.error("Error:", error);
                // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
            });
    });



})(jQuery);
</script>

<!-- gridjs js -->

<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>



<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>





<script src="{{ URL::asset('assets/js/app.js') }}"></script>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script
    src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js">

</script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
<script src="{{ URL::asset('assets/js/pages/roles/index.js') }}"></script>



@endsection