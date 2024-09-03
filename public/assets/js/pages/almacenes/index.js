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
            var table = document.getElementById("tabla-almacenes");
            var tabla_ver_productos = document.getElementById(
                "tabla-ver-productos"
            );
            const modal_ver_productos = new bootstrap.Modal(
                "#modal-ver-productos"
            );
            const modal_eliminar_almacen = new bootstrap.Modal(
                "#modal-eliminar-almacen"
            );
            var url = table.getAttribute("data-url");
            console.log(url);
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
                    info: "Mostrando _START_ a _END_ de _TOTAL_ en miembros",
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
                searching: true,
                serverSide: true,
                ajax: {
                    url: url, // Ruta que devuelve los datos de los clientes
                    method: "GET",
                    cache: false,
                    dataSrc: function (json) {
                        console.log(json);
                        document.getElementById("almacenes_count").innerText =
                            json.length;
                        return json;
                    }, // La propiedad que contiene los datos en la respuesta del servidor
                },
                columns: [
                    {
                        name: "Almacen",
                        className: "text-start align-middle",
                        data: "nombre",
                        render: function (data, type, row, meta) {
                            return data;
                        },
                    },
                    {
                        name: "Referencias",
                        className: "text-start align-middle",
                        data: null,
                        render: function (data, type, row, meta) {
                            var r = "";
                            return r;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "Racks",
                        data: "racks",
                        render: function (data, type, row, meta) {
                            let ul = document.createElement("ul");

                            // Recorrer el arreglo 'data' y crear elementos li para cada elemento
                            for (let r of data) {
                                // Crear un elemento li
                                let li = document.createElement("li");

                                // Establecer el texto del li como el valor de 'nombre'
                                li.textContent = r.nombre;

                                // Agregar el li al ul
                                ul.appendChild(li);
                            }
                            return ul.outerHTML;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "Estantes",
                        data: null,
                        render: function (data, type, row, meta) {
                            let ul = document.createElement("ul");

                            // Recorrer el arreglo 'data' y crear elementos li para cada elemento
                            for (let r of data.racks) {
                                for (let e of r.estantes) {
                                    let li = document.createElement("li");

                                    // Establecer el texto del li como el valor de 'nombre'
                                    li.textContent = e.nombre;

                                    // Agregar el li al ul
                                    ul.appendChild(li);
                                }
                                // Crear un elemento li
                            }
                            return ul.outerHTML;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "Acciones",
                        data: "id",
                        render: function (data, type, row) {
                            // Crear el div contenedor
                            var div = document.createElement("div");

                            // Crear el botón "Ver productos"
                            var btnVerProductos =
                                document.createElement("button");
                            btnVerProductos.className =
                                "btn btn-success me-2 btn_ver_productos";
                            btnVerProductos.setAttribute("data-id", data);
                            btnVerProductos.textContent = "Ver productos";

                            // Crear el botón "Eliminar"
                            var btnEliminar = document.createElement("button");
                            btnEliminar.className =
                                "btn btn-danger btn_eliminar_almacen";
                            btnEliminar.setAttribute("data-id", data);
                            btnEliminar.textContent = "Eliminar";

                            // Agregar los botones al div contenedor
                            div.appendChild(btnVerProductos);
                            // div.appendChild(btnEliminar);

                            // Retornar el outerHTML del div contenedor
                            return div.outerHTML;
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
                    e.target.classList.contains("btn_eliminar_almacen")
                ) {
                    var id = e.target.getAttribute("data-id");
                    document
                        .getElementById("form-eliminar-almacen")
                        .setAttribute("data-id", id);

                    modal_eliminar_almacen.show();
                }
                if (
                    e.target &&
                    e.target.classList.contains("btn_ver_productos")
                ) {
                    var id = e.target.getAttribute("data-id");
                    fetch("get-almacen/" + id)
                        .then((response) => response.json())
                        .then((data) => {
                            console.log(data);
                            data_tabla_ver_productos.clear();
                            data_tabla_ver_productos.rows.add(data.productos);

                            // Paso 3: Redibujar la tabla
                            data_tabla_ver_productos.draw();
                            modal_ver_productos.show();
                        });
                }
            });

            var data_tabla_ver_productos = new DataTable(tabla_ver_productos, {
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
                    info: "Mostrando productos del pedido",
                    infoEmpty: "Mostrando productos del pedido",
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
                searching: true,
                serverSide: false,
                columns: [
                    {
                        className: "text-start align-middle",
                        name: "foto",
                        data: "producto",
                        render: function (data, type, row) {
                            var url =
                                data.foto != 0
                                    ? "/assets/images/product_images/" +
                                      data.ean +
                                      "." +
                                      data.foto
                                    : "/assets/images/product_images/default.svg";
                            return `<div class="flex-shrink-0 me-3">
                                            <img src="${url}" alt=""
                                            class="avatar rounded-circle"></div>`;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "nombre",
                        data: "producto",
                        render: function (data, type, row) {
                            return data.nombre;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "ean",
                        data: "producto",
                        render: function (data, type, row) {
                            return data.ean;
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
                        name: "numero",
                        data: "rack",
                        render: function (data, type, row) {
                            return data.nombre;
                        },
                    },
                    {
                        className: "text-start align-middle",
                        name: "numero",
                        data: "estante",
                        render: function (data, type, row) {
                            return data.nombre;
                        },
                    },
                ],
                initComplete: function (settings, json) {
                    var paginationContainer = tabla_ver_productos
                        .closest(".dt-container")
                        .querySelector(".dt-paging");
                    paginationContainer.classList.add("mt-4");
                },
            });

            var form_eliminar = document.getElementById(
                "form-eliminar-almacen"
            );

            form_eliminar.addEventListener("submit", (event) => {
                event.preventDefault();
                var id = form_eliminar.getAttribute("data-id");
                // Obtener la acción del formulario
                var action = form_eliminar.action + "/" + id;

                // Serializar los datos del formulario

                var csrfToken = form_eliminar.querySelector(
                    'input[name="_token"]'
                ).value;
                console.log(action);
                fetch(action, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,

                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({
                        _token: csrfToken,
                    }),
                })
                    .then((response) => {
                        console.log(response);
                        return response.json();
                    })
                    .then((data) => {
                        // Manejar la respuesta JSON
                        console.log(data);

                        if (!data.success) {
                            iziToast.show({
                                title: "Problema de validación!",
                                titleSize: "",
                                titleLineHeight: "",
                                titleColor: "#ffffff",
                                message: data.message,
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
                                onOpening: function (instance, toast) {
                                    toast.querySelector(
                                        ".icono-toast"
                                    ).style.fontSize = "20px"; // Cambiar el tamaño del icono
                                },
                                onClosed: function () {},
                            });
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
                            modal_eliminar_almacen.hide();
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
