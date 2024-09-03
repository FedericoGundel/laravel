@extends('layouts.master')

@section('title')Form Advanced Plugins @endsection

@section('css')





@endsection

@section('content')

{{-- breadcrumbs  --}}

@section('breadcrumb')

@component('components.breadcrumb')

@slot('li_1') Forms @endslot

@slot('title') Form Advanced Plugins @endslot

@endcomponent

@endsection

<div class="row">

    <div class="col-12">

        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">

            <h5 class="mb-0 pb-1 text-decoration-underline">Crear producto</h5>

        </div>

    </div>

</div>
<div id="form-add-producto" data-action="{{ route('add-productos')}}">
    @csrf
    <div class="row">

        <div class="col-xl-12 mb-4">

            <div class="card h-100 mb-0">

                <div class="card-header justify-content-between d-flex align-items-center">

                    <h4 class="card-title">General</h4>

                </div><!-- end card header -->

                <div class="card-body">

                    <div>

                        <div class="row">

                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label for="choices-single-default" class="form-label font-size-13 text-muted">EAN

                                    </label>

                                    <input class="form-control" type="text" value="" name="ean" id="ean-producto">

                                </div>

                            </div><!-- end col -->

                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label for="choices-single-default"
                                        class="form-label font-size-13 text-muted">Código

                                        interno

                                    </label>

                                    <input class="form-control" type="text" value="" name="codigo" id="codigo-producto">

                                </div>

                            </div><!-- end col -->

                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label for="choices-single-default"
                                        class="form-label font-size-13 text-muted">Nombre

                                    </label>

                                    <input class="form-control" type="text" value="" name="nombre" id="nombre-producto">

                                </div>

                            </div><!-- end col -->

                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label for="choices-single-default"
                                        class="form-label font-size-13 text-muted">Familia

                                        de productos

                                    </label>

                                    <livewire:multi-option-select tableName="familia_producto"
                                        componentId="familia_producto" />


                                </div>

                            </div><!-- end col -->

                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label for="choices-single-default" class="form-label font-size-13 text-muted">Foto
                                        del

                                        producto

                                    </label>

                                    <input class="form-control" type="file" id="foto-producto" name="foto">

                                </div>

                            </div><!-- end col -->

                        </div>

                        <!-- end row -->

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-6 mb-4 d-none">

            <div class="card h-100 mb-0">

                <div class="card-header justify-content-between d-flex align-items-center">

                    <h4 class="card-title">Ubicación</h4>

                </div><!-- end card header -->

                <div class="card-body">

                    <div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label for="choices-single-default"
                                        class="form-label font-size-13 text-muted">Almacén

                                    </label>


                                    <livewire:multi-option-select tableName="almacenes" componentId="almacenes" />

                                </div>

                            </div><!-- end col -->

                            <div class="col-md-6">

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

                        </div><!-- end col -->

                        <div class="col-md-6">

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

                    <!-- end row -->

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-header justify-content-between d-flex align-items-center">

                <h4 class="card-title">Cantidades</h4>

            </div><!-- end card header -->

            <div class="card-body">

                <div class="">





                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-3">

                                <label for="choices-single-default" class="form-label font-size-13 text-muted">Total
                                    de

                                    productos disponibles

                                </label>

                                <input class="form-control" type="number" value=1 name="cantidad"
                                    id="cantidad-producto">

                            </div>

                        </div><!-- end col -->

                        <div class="col-md-6">

                            <div class="mb-3">

                                <label for="choices-single-default" class="form-label font-size-13 text-muted">Tipo
                                    de

                                    unidad

                                </label>

                                <select class="form-select" name="tipo_unidad" id="tipo-unidad-producto">

                                    <option>Caja</option>

                                    <option>Bolsa</option>

                                    <option>Unidad</option>

                                </select>

                            </div>

                        </div>





                        <!-- end col -->

                    </div>

                    <!-- end row -->

                </div>

                <!-- multi select input Example -->





            </div>

            <!-- end card body -->

        </div><!-- end card -->

    </div><!-- end col -->

</div><!-- end row -->

<div class="row">

    <div class="col-12">

        <div class="mb-4">

            <button id="btn_crear_producto" class="btn btn-primary w-md">Crear</button>

        </div>

    </div>

</div>
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
        getRacks(id_racks)
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

<!-- plugins -->

<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>




<script src="{{ URL::asset('assets/js/pages/crear-producto/index.js') }}"></script>





@endsection