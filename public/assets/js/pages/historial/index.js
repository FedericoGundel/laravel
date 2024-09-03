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

            var url = table.getAttribute("data-url");

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
                    info: "Mostrando _START_ a _END_ de _TOTAL_ en productos",
                    infoEmpty: "Mostrando miembros",
                    infoFiltered: "(Filtrado del total de entradas)",
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
                        className: "mb-4",
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

                        return json;
                    }, // La propiedad que contiene los datos en la respuesta del servidor
                },
                columns: [
                    {
                        name: "ID",
                        className: "text-start align-middle",
                        data: "id",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        name: "Foto",
                        className: "text-start align-middle",
                        data: null,
                        render: function (data, type, row, meta) {
                            var imagen;
                            if (data.foto == "0") {
                                imagen =
                                    '<div class="flex-shrink-0 me-3"><img src="/assets/images/product_images/default.svg" alt="" class="avatar rounded-circle"></div>';
                            } else {
                                imagen =
                                    '<div class="flex-shrink-0 me-3"><img src="/assets/images/product_images/' +
                                    data.codigo +
                                    "." +
                                    data.foto +
                                    '" alt="" class="avatar rounded-circle"></div>';
                            }
                            return imagen;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "Nombre",
                        data: "nombre",
                    },
                    {
                        className: "text-start align-middle",
                        name: "Acciones",
                        data: "id",
                        render: function (data, type, row) {
                            return '<a href="#" class="btn btn-success">Ver detalles</a>';
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

            /******/
        })();
        /******/
    })();
    /******/
})();
