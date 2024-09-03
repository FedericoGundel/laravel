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

                                <lord-icon class="mb-2" src="https://cdn.lordicon.com/bsyafhzi.json" trigger="hover"
                                    colors="primary:#4b9e44,secondary:#454340" style="width:50px;height:50px">

                                </lord-icon>



                                <h3 id="almacenes_count" class="text-black mb-2"></h3>

                                <p class="text-black-50 mb-0 text-truncate">Almacenes

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

                <h4 class="card-title">Almacenes</h4>

            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">


                    <div class="col-md-4">

                        <div class="mb-3">

                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Almacén

                            </label>


                            <livewire:multi-option-select tableName="almacenes" componentId="almacenes" />

                        </div>

                    </div><!-- end col -->

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label font-size-13 text-muted">Rack

                            </label>
                            <div class="input-group" style="flex-wrap:nowrap;">
                                <select id="select_racks" class=" form-control">
                                    <option value="No">Ninguno</option>
                                </select>

                                <button class="btn btn-success input-group-text" id="btn_add_rack"><i
                                        class="far fas fa-plus"></i></button>
                                <button class="btn btn-info input-group-text" id="btn_edit_rack">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger input-group-text" id="btn_delete_rack">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>


                    </div>



                    <div class="col-md-4">

                        <div class="mb-3">

                            <label for="choices-single-default" class="form-label font-size-13 text-muted">Estante

                            </label>
                            <div class="input-group" style="flex-wrap:nowrap;">
                                <select id="select_estantes" class=" form-control">
                                    <option value="No">Ninguno</option>
                                </select>

                                <button class="btn btn-success input-group-text" id="btn_add_estante"><i
                                        class="far fas fa-plus"></i></button>
                                <button class="btn btn-info input-group-text" id="btn_edit_estante">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger input-group-text" id="btn_delete_estante">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>

                        </div>

                    </div><!-- end col -->

                </div>




                <div class="table-responsive">
                    <table class="table w-100" id="tabla-almacenes" data-url="{{ route('get-almacenes') }}">
                        <thead>
                            <tr>
                                <th>Almacen</th>
                                <th>Referencias</th>
                                <th>Racks</th>
                                <th>Estantes</th>
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

<!-- end row -->

<div class="modal fade modal modal-lg" id="modal-ver-productos" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Productos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">

                    <table id="tabla-ver-productos"
                        class="table project-list-table table-nowrap align-middle table-borderless mb-0">

                        <thead>

                            <tr>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>EAN</th>
                                <th>Número de pedido</th>
                                <th>Rack</th>
                                <th>Estante</th>
                            </tr>

                        </thead>

                        <tbody>















                        </tbody>

                    </table>

                </div>
            </div>
            <div class="modal-footer">

                <button class="btn btn-danger" data-dismiss="modal" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade modal-sm" id="modal-eliminar-almacen" role="dialog" aria-hidden="true">

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
                <form method="POST" id="form-eliminar-almacen" action="delete-almacenes">
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>

                </form><!-- end form -->

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div>
<div class="modal fade" id="addModal_racks">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="form-add-racks" action="add-racks" class="form-dinamico-add">
                @csrf
                <div class="modal-body">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" id="" name="nombre" placeholder="">
                </div>

                <div class="modal-footer">

                    <button class="btn btn-success" type="submit">Guardar</button>



                </div>
            </form><!-- end form -->

        </div>
    </div>
</div>

<div class="modal fade" id="editModal_racks">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="form-edit-racks" action="edit-racks">
                @csrf
                <div class="modal-body">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" id="" name="nombre" placeholder="">
                </div>

                <div class="modal-footer">

                    <button class="btn btn-success" type="submit">Guardar</button>



                </div>
            </form><!-- end form -->

        </div>
    </div>
</div>
<div class="modal fade" id="addModal_estantes">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="form-add-estantes" action="add-estantes" class="form-dinamico-add">
                @csrf
                <div class="modal-body">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" id="" name="nombre" placeholder="">
                </div>

                <div class="modal-footer">

                    <button class="btn btn-success" type="submit">Guardar</button>



                </div>
            </form><!-- end form -->

        </div>
    </div>
</div>

<div class="modal fade" id="editModal_estantes">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="form-edit-estantes" action="edit-estantes">
                @csrf
                <div class="modal-body">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" id="" name="nombre" placeholder="">
                </div>

                <div class="modal-footer">

                    <button class="btn btn-success" type="submit">Guardar</button>



                </div>
            </form><!-- end form -->

        </div>
    </div>
</div>

@endsection

@section('script')
<script>
(function($) {
    'use strict';
    $("#select_racks").select2();

    function getRacks(id_almacenes, id_racks = "No") {
        fetch("get-racks")
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                data = data
                    .map(function(item) {
                        if (item.id_almacenes == id_almacenes) {
                            return {
                                id: item.id,
                                text: item.nombre,
                                nombre: item.nombre,
                                selected: (id_racks == item.id) ? true : false
                            };
                        } else {
                            return null;
                        }
                    })
                    .filter(function(item) {
                        return item !== null;
                    });

                data.unshift({
                    id: 'No',
                    text: 'Ninguno',
                    selected: (id_racks == "No") ? true : false
                });


                $('#select_racks').empty();
                $('#select_racks').select2({
                    data: data
                }).trigger("change");
            })

    }

    $("#select_almacenes").change(function() {
        var id_almacenes = $(this).val()
        $('#tabla-almacenes').DataTable().ajax.reload(null, false);
        getRacks(id_almacenes)
    })
    var form = document.getElementById("form-add-racks")
    var form_edit = document.getElementById("form-edit-racks")
    var modal_add_racks = new bootstrap.Modal("#addModal_racks");
    var modal_edit_racks = new bootstrap.Modal("#editModal_racks");
    $("#btn_add_rack").click(function() {
        var id_almacenes = $("#select_almacenes").val()
        console.log(id_almacenes);
        if (id_almacenes != "No") {
            modal_add_racks.show();
        }
    })
    $("#btn_edit_rack").click(function() {
        var id_almacenes = $("#select_racks").val()
        console.log(id_almacenes);
        if (id_almacenes != "No") {
            var data = $('#select_racks').select2('data')[0];

            form_edit.querySelector(
                "input[name='nombre']"
            ).value = data.nombre;
            modal_edit_racks.show();
        }
    })
    form.addEventListener("submit", (event) => {
        event.preventDefault();

        // Obtener la acción del formulario
        var action = "add-racks";

        var id_almacenes = $("#select_almacenes").val()
        // Serializar los datos del formulario
        const formData = new FormData(form);


        formData.append(
            "id_almacenes",
            id_almacenes
        );



        fetch(action, {
                method: "POST",
                body: formData,
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                // Manejar la respuesta JSON

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


                    getRacks(id_almacenes, data.rack.id)
                    form.querySelector(
                        "input[name='nombre']"
                    ).value = "";
                    modal_add_racks.hide();
                }
                // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
            })
            .catch((error) => {
                // Manejar los errores
                console.error("Error:", error);
                // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
            });
    });

    form_edit.addEventListener("submit", (event) => {
        event.preventDefault();

        // Obtener la acción del formulario


        var id_racks = document.getElementById("select_racks").value;

        var id_almacenes = $("#select_almacenes").val()

        var action = "edit-racks/" + id_racks;
        var csrfToken = document.querySelector(
            'input[name="_token"]'
        ).value;
        var nuevoNombre = form_edit.querySelector(
            'input[name="nombre"]'
        ).value;
        fetch(action, {
                method: "PUT",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Content-Type": "application/json",
                    Accept: "application/json",
                },
                body: JSON.stringify({
                    nombre: nuevoNombre,
                }),
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                // Manejar la respuesta JSON

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


                    getRacks(id_almacenes, data.rack.id)
                    form.querySelector(
                        "input[name='nombre']"
                    ).value = "";
                    modal_edit_racks.hide();
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
<script>
(function($) {
    'use strict';
    $("#select_estantes").select2();

    function getRacks(id_racks, id_estantes = "No") {
        fetch("get-estantes")
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                data = data
                    .map(function(item) {
                        if (item.id_racks == id_racks) {
                            return {
                                id: item.id,
                                text: item.nombre,
                                nombre: item.nombre,
                                selected: (id_estantes == item.id) ? true : false
                            };
                        } else {
                            return null;
                        }
                    })
                    .filter(function(item) {
                        return item !== null;
                    });

                data.unshift({
                    id: 'No',
                    text: 'Ninguno',
                    selected: (id_estantes == "No") ? true : false
                });


                $('#select_estantes').empty();
                $('#select_estantes').select2({
                    data: data
                }).trigger("change");
            })

    }

    $("#select_racks").change(function() {
        var id_racks = $(this).val()
        $('#tabla-almacenes').DataTable().ajax.reload(null, false);
        getRacks(id_racks)
    })
    $("#select_estantes").change(function() {

        $('#tabla-almacenes').DataTable().ajax.reload(null, false);

    })
    var form = document.getElementById("form-add-estantes")
    var form_edit = document.getElementById("form-edit-estantes")
    var modal_add_estantes = new bootstrap.Modal("#addModal_estantes");
    var modal_edit_estantes = new bootstrap.Modal("#editModal_estantes");
    $("#btn_add_estante").click(function() {
        var id_racks = $("#select_racks").val()
        console.log(id_racks);
        if (id_racks != "No") {
            modal_add_estantes.show();
        }
    })
    $("#btn_edit_estante").click(function() {
        var id_racks = $("#select_estantes").val()
        console.log(id_racks);
        if (id_racks != "No") {
            var data = $('#select_estantes').select2('data')[0];

            form_edit.querySelector(
                "input[name='nombre']"
            ).value = data.nombre;
            modal_edit_estantes.show();
        }
    })
    form.addEventListener("submit", (event) => {
        event.preventDefault();

        // Obtener la acción del formulario
        var action = "add-estantes";

        var id_racks = $("#select_racks").val()
        // Serializar los datos del formulario
        const formData = new FormData(form);


        formData.append(
            "id_racks",
            id_racks
        );



        fetch(action, {
                method: "POST",
                body: formData,
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                // Manejar la respuesta JSON

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


                    getRacks(id_racks, data.estante.id)
                    form.querySelector(
                        "input[name='nombre']"
                    ).value = "";
                    modal_add_estantes.hide();
                }
                // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
            })
            .catch((error) => {
                // Manejar los errores
                console.error("Error:", error);
                // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
            });
    });

    form_edit.addEventListener("submit", (event) => {
        event.preventDefault();

        // Obtener la acción del formulario


        var id_estantes = document.getElementById("select_estantes").value;

        var id_racks = $("#select_racks").val()

        var action = "edit-estantes/" + id_estantes;
        var csrfToken = document.querySelector(
            'input[name="_token"]'
        ).value;
        var nuevoNombre = form_edit.querySelector(
            'input[name="nombre"]'
        ).value;
        fetch(action, {
                method: "PUT",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Content-Type": "application/json",
                    Accept: "application/json",
                },
                body: JSON.stringify({
                    nombre: nuevoNombre,
                }),
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                // Manejar la respuesta JSON

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


                    getRacks(id_racks, data.estante.id)
                    form.querySelector(
                        "input[name='nombre']"
                    ).value = "";
                    modal_edit_estantes.hide();
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




<script
    src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js">

</script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>

<script src="{{ URL::asset('assets/js/pages/almacenes/index.js') }}"></script>

<script src="{{ URL::asset('assets/js/app.js') }}"></script>





@endsection