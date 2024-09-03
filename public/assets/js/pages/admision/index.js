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

            // Basic Table

            var table = document.getElementById("tabla-solicitudes");

            var url = table.getAttribute("data-url");

            const modal_aceptar = new bootstrap.Modal(
                "#modal-aceptar-solicitud"
            );
            const modal_eliminar = new bootstrap.Modal(
                "#modal-eliminar-solicitud"
            );
            var tabla_miembros = new DataTable(table, {
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

                    info: "Mostrando _START_ a _END_ de _TOTAL_ en solicitudes pendientes",

                    infoEmpty: "Mostrando 0 a 0 de 0 en pedidos",

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
                serverSide: false,
                ajax: {
                    url: url, // Ruta que devuelve los datos de los clientes
                    method: "GET",
                    cache: false,
                    dataSrc: function (json) {
                        console.log(json);
                        document.getElementById("solicitudes_count").innerText =
                            json.length;
                        return json;
                    }, // La propiedad que contiene los datos en la respuesta del servidor
                },

                columns: [
                    {
                        name: "ID",

                        className: "text-start align-middle",

                        data: "id",

                        render: function (data, type, row, meta) {
                            return (
                                '<span style="padding-left: 32px !important;padding-right: 50px !important;">' +
                                data +
                                "</span>"
                            );
                        },
                    },

                    {
                        className: "text-start align-middle",

                        name: "username",

                        data: "username",
                    },

                    {
                        className: "text-start align-middle",

                        name: "fecha",

                        data: "created_at",

                        render: function (data, type, row, meta) {
                            var fecha = new Date(data);

                            // Formatear la fecha en el formato deseado (año-mes-dia)
                            var fechaFormateada = fecha.toLocaleDateString(
                                "es-ES",
                                {
                                    year: "numeric",
                                    month: "2-digit",
                                    day: "2-digit",
                                }
                            );

                            return fechaFormateada;
                        },
                    },

                    {
                        className: "text-start align-middle",

                        name: "Acciones",

                        data: "id",

                        render: function (data, type, row) {
                            return (
                                '<button data-id="' +
                                data +
                                '" class="btn me-2 btn-success btn_aceptar_solicitud">Aceptar</button><button data-id="' +
                                data +
                                '" class="btn_eliminar_solicitud btn btn-danger">Eliminar</button>'
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
            document.addEventListener("click", function (e) {
                if (
                    e.target &&
                    e.target.classList.contains("btn_aceptar_solicitud")
                ) {
                    var id = e.target.getAttribute("data-id");
                    document
                        .getElementById("form-aceptar-solicitud")
                        .setAttribute("data-id", id);
                    console.log(
                        document
                            .getElementById("form-aceptar-solicitud")
                            .getAttribute("data-id")
                    );
                    modal_aceptar.show();
                }
            });

            // Event delegation for the Delete button
            document.addEventListener("click", function (e) {
                if (
                    e.target &&
                    e.target.classList.contains("btn_eliminar_solicitud")
                ) {
                    var id = e.target.getAttribute("data-id");
                    document
                        .getElementById("form-eliminar-solicitud")
                        .setAttribute("data-id", id);
                    console.log(
                        document
                            .getElementById("form-eliminar-solicitud")
                            .getAttribute("data-id")
                    );
                    modal_eliminar.show();
                }
            });

            var form = document.getElementById("form-aceptar-solicitud");

            form.addEventListener("submit", (event) => {
                event.preventDefault();
                var id = form.getAttribute("data-id");
                // Obtener la acción del formulario
                var action = form.action + "/" + id;

                // Serializar los datos del formulario

                var csrfToken = document.querySelector(
                    'input[name="_token"]'
                ).value;
                console.log(action);
                fetch(action, {
                    method: "PUT",

                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
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
                                        alert(elemento);
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

                            tabla_miembros.ajax.reload();
                            modal_aceptar.hide();
                        }
                        // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
                    })
                    .catch((error) => {
                        // Manejar los errores
                        console.error("Error:", error);
                        // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
                    });
            });

            var form_eliminar = document.getElementById(
                "form-eliminar-solicitud"
            );

            form_eliminar.addEventListener("submit", (event) => {
                event.preventDefault();
                var id = form_eliminar.getAttribute("data-id");
                // Obtener la acción del formulario
                var action = form_eliminar.action + "/" + id;

                // Serializar los datos del formulario

                var csrfToken = document.querySelector(
                    'input[name="_token"]'
                ).value;
                console.log(action);
                fetch(action, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
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
                                        alert(elemento);
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

                            tabla_miembros.ajax.reload();
                            modal_eliminar.hide();
                        }
                        // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
                    })
                    .catch((error) => {
                        // Manejar los errores
                        console.error("Error:", error);
                        // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
                    });
            });

            /******/
        })();

        /******/
    })();

    /******/
})();
