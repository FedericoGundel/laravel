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

            var table = document.getElementById("tabla-productos-recibidos");
            var usersUrl = table.getAttribute("data-users-url");

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
                    info: "Mostrando _START_ a _END_ de _TOTAL_ en miembros",
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
                serverSide: false,
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
                ajax: {
                    url: "get-productos-pedido", // Ruta que devuelve los datos de los clientes
                    method: "GET",
                    cache: false,
                    dataSrc: function (json) {
                        console.log(json);
                        /*document.getElementById("almacenes_count").innerText =
                            json.length;*/
                        return json;
                    }, // La propiedad que contiene los datos en la respuesta del servidor
                },
                searching: true,
                columns: [
                    {
                        name: "nombre",
                        className: "text-start align-middle",
                        data: "producto",
                        render: function (data, type, row) {
                            return data.nombre;
                        },
                    },
                    {
                        name: "cantidad",
                        className: "text-start align-middle",
                        data: "cantidad",
                        render: function (data, type, row) {
                            return data;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "numero",
                        data: "pedido",
                        render: function (data, type, row) {
                            return data.numero;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "acciones",
                        data: null,
                        render: function (data, type, row) {
                            var clase = data.verificado ? "info" : "success";
                            var texto = data.verificado
                                ? "Verificado"
                                : "Verificar";
                            return (
                                '<button data-id="' +
                                data.id +
                                '" class="btn btn-' +
                                clase +
                                ' btn_verificar">' +
                                texto +
                                "</button>"
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

            /******/
        })();
        /******/
    })();
    /******/
})();
