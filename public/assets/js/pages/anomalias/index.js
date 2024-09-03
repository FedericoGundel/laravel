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

            var table = document.getElementById("tabla-anomalias");

            var data = [
                {
                    foto: "Auriculares",
                    productos: "3",
                    ref: "Juan García",
                    operario: "4F43EE",
                    productos_registrados: "Juan García",
                    productos_disponibles: "Juan García",
                },

                // Agrega más objetos de datos según sea necesario
            ];

            var tabla_anomalias = new DataTable(table, {
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
                    info: "Mostrando _START_ a _END_ de _TOTAL_ en anomalías",
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
                    url: "get-anomalias", // Ruta que devuelve los datos de los clientes
                    method: "GET",
                    cache: false,
                    dataSrc: function (json) {
                        console.log(json);

                        document.getElementById("anomalias_count").innerText =
                            json.length;
                        return json;
                    }, // La propiedad que contiene los datos en la respuesta del servidor
                },
                columns: [
                    {
                        className: "text-start align-middle",
                        name: "foto",
                        data: "producto_pedido",
                        render: function (data, type, row) {
                            var url =
                                data.producto.foto != 0
                                    ? "/assets/images/product_images/" +
                                      data.producto.ean +
                                      "." +
                                      data.producto.foto
                                    : "/assets/images/product_images/default.svg";
                            return `<div class="flex-shrink-0 me-3">
                                        <img src="${url}" alt=""
                                        class="avatar rounded-circle"></div>`;
                        },
                    },

                    {
                        className: "text-start align-middle",
                        name: "numero",
                        data: "producto_pedido",
                        render: function (data, type, row) {
                            return data.pedido.numero;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "Operario",
                        data: null,
                        render: function (data, type, row) {
                            return "Ninguno";
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "cantidad_i",
                        data: "cantidad_i",
                    },
                    {
                        className: "text-start align-middle",
                        name: "cantidad",
                        data: "cantidad",
                    },
                    {
                        className: "text-start align-middle",
                        name: "Acciones",
                        data: null,
                        render: function (data, type, row) {
                            return '<button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modal-scanner">Ver detalles</button><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-scanner">Eliminar</button>';
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
