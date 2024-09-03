/******/ (() => {
    // webpackBootstrap

    var __webpack_exports__ = {};

    /*!*******************************************!*\

      !*** ./resources/js/pages/gridjs.init.js ***!

      \*******************************************/

    /******/ (function () {
        // webpackBootstrap

        var __webpack_exports__ = {};

        /*!*******************************************!*\

        !*** ./resources/js/pages/gridjs.init.js ***!

        \*******************************************/

        /******/

        (function () {
            // webpackBootstrap

            var __webpack_exports__ = {};

            /*!*******************************************!*\

          !*** ./resources/js/pages/gridjs.init.js ***!

          \*******************************************/

            /*

        Template Name: Vuesy - Admin & Dashboard Template

        Author: Themesdesign

        Website: https://Themesdesign.in/

        Contact: themesdesign.in@gmail.com

        File: grid Js File

        */

            var table = document.getElementById("tabla-productos");
            const modal_editar_producto = new bootstrap.Modal(
                "#modal-editar-producto"
            );
            var tabla_productos = new DataTable(table, {
                responsive: true,

                dom: "Blfrtip",

                lengthMenu: [
                    [10, 25, 50, -1],

                    [10, 25, 50, "Todos"],
                ],

                pageLength: 10,

                language: {
                    search: "Buscar",

                    emptyTable: "No hay información",

                    info: "Mostrando _START_ a _END_ de _TOTAL_ en productos del pedido",

                    infoEmpty: "Mostrando 0 a 0 de 0 en productos del pedido",

                    infoFiltered: "(Filtrado de _MAX_ total entradas)",

                    infoPostFix: "",

                    thousands: ",",

                    lengthMenu: "Mostrar _MENU_ Entradas",

                    // loadingRecords: "Cargando...",

                    processing: "Cargando...",

                    loadingRecords: "",

                    paginate: {
                        first: "Primero",

                        last: "Ultimo",

                        next: "Siguiente",

                        previous: "Anterior",
                    },
                },

                stateSave: true,

                stateSaveCallback: function (settings, data) {
                    localStorage.setItem(
                        "DataTables_" + settings.sInstance,

                        JSON.stringify(data)
                    );
                },

                stateLoadCallback: function (settings) {
                    return JSON.parse(
                        localStorage.getItem("DataTables_" + settings.sInstance)
                    );
                },

                order: [[0, "desc"]],

                buttons: [
                    {
                        extend: "colvis",

                        text: "Ocultar Columnas",

                        collectionLayout: "fixed two-column",

                        className: "form-control mb-4",
                    },
                ],

                searching: true,

                columns: [
                    {
                        name: "nombre",

                        className: "text-start align-middle",

                        data: "nombre",
                    },

                    {
                        name: "codigo",

                        className: "text-start align-middle",

                        data: "codigo",
                    },

                    {
                        className: "text-start align-middle",

                        name: "ean",

                        data: "ean",
                    },

                    {
                        className: "text-start align-middle",

                        name: "cantidad",

                        data: "cantidad",
                    },
                    {
                        className: "text-start align-middle",
                        name: "acciones",
                        data: null, // No es necesario definir `data` aquí
                        render: function (data, type, row, meta) {
                            // `meta.row` contiene el índice de la fila
                            var index = meta.row;

                            return (
                                '<button data-index="' +
                                index +
                                '" class="btn me-2 btn-success btn_editar_producto">Editar</button>' +
                                '<button data-index="' +
                                index +
                                '" class="btn btn-danger btn_eliminar_producto">Eliminar</button>'
                            );
                        },
                    },
                ],

                initComplete: function (settings, json) {
                    var paginationContainer = table

                        .closest(".dt-container")

                        .querySelector(".dt-paging");

                    paginationContainer.classList.add("mt-4");
                },
            });

            document

                .getElementById("btn_add_producto_lista")

                .addEventListener("click", function () {
                    if (
                        document.getElementById("select_productos").value !=
                        "No"
                    ) {
                        var id =
                            document.getElementById("select_productos").value;

                        fetch("get-producto/" + id)
                            .then((response) => response.json())
                            .then((producto) => {
                                producto.cantidad =
                                    document.getElementById(
                                        "cantidad-producto"
                                    ).value;

                                tabla_productos.row.add(producto).draw();
                            });
                    }
                });

            const form = document.getElementById("form-add-pedido");

            document
                .getElementById("btn_crear_pedido")

                .addEventListener("click", function () {
                    var datosFilas = tabla_productos.rows().data().toArray();

                    datosFilas.forEach(function (fila) {
                        delete fila.acciones;
                    });

                    console.log(datosFilas);

                    var csrfToken = form.querySelector(
                        'input[name="_token"]'
                    ).value;

                    // Obtener los valores de los inputs por su id y almacenarlos en el objeto formData

                    var numero = document.getElementById("numero-pedido").value;

                    var fecha = document.getElementById("fecha-pedido").value;

                    var numero_albaran = document.getElementById(
                        "numero-albaran-pedido"
                    ).value;

                    var observaciones =
                        document.getElementById("observaciones").value;

                    var id_receptores =
                        document.getElementById("select_receptores").value !=
                        "No"
                            ? document.getElementById("select_receptores").value
                            : null;

                    var id_emisores =
                        document.getElementById("select_emisores").value != "No"
                            ? document.getElementById("select_emisores").value
                            : null;

                    var id_proveedores =
                        document.getElementById("select_proveedores").value !=
                        "No"
                            ? document.getElementById("select_proveedores")
                                  .value
                            : null;

                    var id_estados =
                        document.getElementById("select_estados").value != "No"
                            ? document.getElementById("select_estados").value
                            : null;

                    // Mostrar los datos en la consola

                    // Crear un nuevo objeto FormData

                    var formDataToSend = new FormData();

                    formDataToSend.append("_token", csrfToken);

                    formDataToSend.append("numero", numero);

                    formDataToSend.append("fecha", fecha);

                    formDataToSend.append("numero_albaran", numero_albaran);

                    formDataToSend.append("observaciones", observaciones);

                    formDataToSend.append("id_receptores", id_receptores);

                    formDataToSend.append("id_emisores", id_emisores);

                    formDataToSend.append("id_proveedores", id_proveedores);

                    formDataToSend.append("id_estados", id_estados);

                    formDataToSend.append(
                        "productos",

                        JSON.stringify(datosFilas)
                    );

                    console.log(formDataToSend);

                    // Enviar la solicitud fetch con los datos del formDataToSend

                    const action = form.getAttribute("data-action");

                    fetch(action, {
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
                                for (var atributo in data.errors) {
                                    if (data.errors.hasOwnProperty(atributo)) {
                                        data.errors[atributo].forEach(function (
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
                                                transitionOutMobile:
                                                    "fadeOutDown",
                                                layout: 2,
                                                maxWidth: "400px",
                                                onOpening: function (
                                                    instance,
                                                    toast
                                                ) {
                                                    toast.querySelector(
                                                        ".icono-toast"
                                                    ).style.fontSize = "20px"; // Cambiar el tamaño del icono
                                                },
                                                onClosed: function () {},
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
                                    onOpening: function (instance, toast) {
                                        toast.querySelector(
                                            ".icono-toast"
                                        ).style.fontSize = "20px"; // Cambiar el tamaño del icono
                                    },
                                    onClosed: function () {},
                                });

                                window.location.href = "./historial-pedidos";
                            }

                            // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
                        })

                        .catch((error) => {
                            // Manejar los errores

                            console.error("Error:", error);

                            // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
                        });
                });

            document.addEventListener("click", function (e) {
                if (
                    e.target &&
                    e.target.classList.contains("btn_editar_producto")
                ) {
                    var index = e.target.getAttribute("data-index");
                    document
                        .getElementById("btn_editar_producto2")
                        .setAttribute("data-index", index);
                    var rowData = tabla_productos.row(index).data();
                    console.log(rowData);

                    document.getElementById("nombre-producto-editar").value =
                        rowData.nombre;
                    document.getElementById("codigo-producto-editar").value =
                        rowData.codigo;
                    document.getElementById("ean-producto-editar").value =
                        rowData.ean;
                    document.getElementById("cantidad-producto-editar").value =
                        rowData.cantidad;
                    modal_editar_producto.show();
                }
                if (
                    e.target &&
                    e.target.classList.contains("btn_eliminar_producto")
                ) {
                    var index = e.target.getAttribute("data-index");
                    var row = tabla_productos.row(index); // Obtén la fila
                    row.remove().draw();
                }
            });
            document
                .getElementById("btn_editar_producto2")
                .addEventListener("click", function (e) {
                    var index = e.target.getAttribute("data-index");
                    var row = tabla_productos.row(index); // Obtén la fila

                    var data = {
                        nombre: document.getElementById(
                            "nombre-producto-editar"
                        ).value,
                        codigo: document.getElementById(
                            "codigo-producto-editar"
                        ).value,
                        ean: document.getElementById("ean-producto-editar")
                            .value,
                        cantidad: document.getElementById(
                            "cantidad-producto-editar"
                        ).value,
                    };
                    row.data(data).draw();
                    modal_editar_producto.hide();
                });

            /******/
        })();

        /******/
    })();

    /******/
})();
