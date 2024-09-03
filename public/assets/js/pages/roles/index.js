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
            const RolesCambiados = new CustomEvent("RolesCambiados", {
                detail: {
                    message: "Hello, World!",
                },
            });

            var table = document.getElementById("tabla-roles");

            var url = table.getAttribute("data-url");

            const modal_agregar_rol = new bootstrap.Modal("#modal-aregar-rol");
            const modal_editar_rol = new bootstrap.Modal("#modal-editar-rol");
            const modal_rol_defecto = new bootstrap.Modal("#modal-rol-defecto");
            const modal_eliminar_rol = new bootstrap.Modal(
                "#modal-eliminar-rol"
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
                        text: "Agregar rol",
                        className: "btn btn-success mb-4", // Puedes agregar más clases de Bootstrap o personalizadas
                        action: function (e, dt, node, config) {
                            modal_agregar_rol.show();
                        },
                    },
                    {
                        text: "Rol por defecto",
                        className: "btn btn-info mb-4", // Puedes agregar más clases de Bootstrap o personalizadas
                        action: function (e, dt, node, config) {
                            modal_rol_defecto.show();
                        },
                    },
                    {
                        extend: "colvis",

                        text: "Ocultar Columnas",

                        className: "btn mb-4",
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
                        document.getElementById("roles_count").innerText =
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

                        name: "name",

                        data: "name",
                    },

                    {
                        className: "text-start align-middle",

                        name: "permisos",

                        data: "permisos",

                        render: function (data, type, row, meta) {
                            let ul = document.createElement("ul");

                            // Recorrer el arreglo 'data' y crear elementos li para cada elemento
                            for (let r of data) {
                                // Crear un elemento li
                                let li = document.createElement("li");

                                // Establecer el texto del li como el valor de 'nombre'
                                li.textContent = r;

                                // Agregar el li al ul
                                ul.appendChild(li);
                            }
                            return ul.outerHTML;
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
                                '" class="btn me-2 btn-success btn_editar_rol">Editar</button><button data-id="' +
                                data +
                                '" class="btn btn-danger btn_eliminar_rol">Eliminar</button>'
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
                if (e.target && e.target.classList.contains("btn_editar_rol")) {
                    var id = e.target.getAttribute("data-id");
                    document
                        .getElementById("form-editar-rol")
                        .setAttribute("data-id", id);
                    console.log(
                        document
                            .getElementById("form-editar-rol")
                            .getAttribute("data-id", id)
                    );
                    document.getElementById("nombre-rol-editar").value = "";

                    fetch("get-rol/" + id)
                        .then((response) => response.json())
                        .then((data) => {
                            console.log(data);
                            document.getElementById("nombre-rol-editar").value =
                                data.name;
                            var checkboxes =
                                document.querySelectorAll(".permisos_editar");
                            checkboxes.forEach(function (checkbox) {
                                // Obtener el valor del atributo 'data-permiso' del checkbox actual
                                var permiso =
                                    checkbox.getAttribute("data-permiso");

                                // Verificar si el permiso está presente en el arreglo de nombres de permisos
                                if (data.permisos.includes(permiso)) {
                                    // Marcar el checkbox si el permiso está presente en el arreglo
                                    checkbox.checked = true;
                                } else {
                                    // Desmarcar el checkbox si el permiso no está presente en el arreglo
                                    checkbox.checked = false;
                                }
                            });
                        });

                    modal_editar_rol.show();
                }
                if (
                    e.target &&
                    e.target.classList.contains("btn_eliminar_rol")
                ) {
                    var id = e.target.getAttribute("data-id");
                    document
                        .getElementById("form-eliminar-rol")
                        .setAttribute("data-id", id);

                    modal_eliminar_rol.show();
                }
            });

            var table2 = document.getElementById("tabla-permisos");
            var urlPermisos = table2.getAttribute("data-url");

            var table_permisos = new DataTable(table2, {
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
                    url: urlPermisos, // Ruta que devuelve los datos de los clientes
                    method: "GET",
                    cache: false,
                    dataSrc: function (json) {
                        console.log(json);

                        return json;
                    }, // La propiedad que contiene los datos en la respuesta del servidor
                },

                columns: [
                    {
                        className: "text-start align-middle",

                        name: "permiso",

                        data: "name",
                    },
                    {
                        className: "text-start align-middle",

                        name: "Acciones",

                        data: "name",

                        render: function (data, type, row) {
                            var div = document.createElement("div");
                            div.classList.add("form-check");

                            // Crear la casilla de verificación
                            var checkbox = document.createElement("input");
                            checkbox.classList.add(
                                "form-check-input",
                                "permisos"
                            );
                            checkbox.type = "checkbox";
                            checkbox.dataset.permiso = data;

                            // Crear la etiqueta de la casilla de verificación
                            var label = document.createElement("label");
                            label.classList.add("form-check-label");

                            label.textContent = "Permitido";

                            // Adjuntar la casilla de verificación y la etiqueta al div
                            div.appendChild(checkbox);
                            div.appendChild(label);

                            // Agregar el div al DOM (a un contenedor existente, por ejemplo)
                            var contenedor = document.createElement("div");
                            contenedor.classList.add("text-center");
                            contenedor.appendChild(div);
                            return contenedor;
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
            var form = document.getElementById("form-agregar-rol");
            console.log(form);
            form.addEventListener("submit", (event) => {
                event.preventDefault();

                // Obtener la acción del formulario
                var action = form.action;

                var checkboxes = document.querySelectorAll(".permisos:checked");

                // Array para almacenar los valores de data-id de los checkboxes seleccionados
                var idsSeleccionados = [];

                // Iterar sobre cada checkbox seleccionado y obtener su atributo data-id
                checkboxes.forEach(function (checkbox) {
                    var idPermiso = checkbox.getAttribute("data-permiso");
                    idsSeleccionados.push(idPermiso);
                });

                const formData = new FormData(form);

                formData.append(
                    "name",
                    document.getElementById("nombre-rol").value
                );
                idsSeleccionados.forEach(function (id) {
                    formData.append("permission[]", id);
                });

                var objeto = {};
                formData.forEach(function (valor, clave) {
                    objeto[clave] = valor;
                });

                // Convertir objeto JavaScript a JSON
                var json = JSON.stringify(objeto);

                // Mostrar JSON en consola
                console.log(json);
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
                                            transitionOutMobile: "fadeOutDown",
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
                            tabla_miembros.ajax.reload();
                            document.dispatchEvent(RolesCambiados);
                            modal_agregar_rol.hide();
                        }
                        // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
                    })
                    .catch((error) => {
                        // Manejar los errores
                        console.error("Error:", error);
                        // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
                    });
            });

            var table3 = document.getElementById("tabla-permisos-editar");
            var table_permisos_editar = new DataTable(table3, {
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
                    url: urlPermisos, // Ruta que devuelve los datos de los clientes
                    method: "GET",
                    cache: false,
                    dataSrc: function (json) {
                        console.log(json);

                        return json;
                    }, // La propiedad que contiene los datos en la respuesta del servidor
                },

                columns: [
                    {
                        className: "text-start align-middle",

                        name: "permiso",

                        data: "name",
                    },
                    {
                        className: "text-start align-middle",

                        name: "Acciones",

                        data: "name",

                        render: function (data, type, row) {
                            var div = document.createElement("div");
                            div.classList.add("form-check");

                            // Crear la casilla de verificación
                            var checkbox = document.createElement("input");
                            checkbox.classList.add(
                                "form-check-input",
                                "permisos_editar"
                            );
                            checkbox.type = "checkbox";
                            checkbox.dataset.permiso = data;

                            // Crear la etiqueta de la casilla de verificación
                            var label = document.createElement("label");
                            label.classList.add("form-check-label");

                            label.textContent = "Permitido";

                            // Adjuntar la casilla de verificación y la etiqueta al div
                            div.appendChild(checkbox);
                            div.appendChild(label);

                            // Agregar el div al DOM (a un contenedor existente, por ejemplo)
                            var contenedor = document.createElement("div");
                            contenedor.classList.add("text-center");
                            contenedor.appendChild(div);
                            return contenedor;
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
            var form3 = document.getElementById("form-editar-rol");

            form3.addEventListener("submit", (event) => {
                event.preventDefault();
                var id_rol = form3.getAttribute("data-id");
                var action = form3.action + "/" + id_rol;

                var checkboxes = document.querySelectorAll(
                    ".permisos_editar:checked"
                );
                var formData = new FormData();

                var permission = [];
                checkboxes.forEach(function (checkbox) {
                    var idPermiso = checkbox.getAttribute("data-permiso");
                    permission.push(idPermiso);
                    formData.append("permission[]", idPermiso);
                });

                formData.append(
                    "name",
                    document.getElementById("nombre-rol-editar").value
                );

                var csrfToken = form3.querySelector(
                    'input[name="_token"]'
                ).value;
                console.log(csrfToken);

                fetch(action, {
                    method: "PUT",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({
                        name: document.getElementById("nombre-rol-editar")
                            .value,
                        permission: permission,
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
                                            transitionOutMobile: "fadeOutDown",
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
                            tabla_miembros.ajax.reload();
                            document.dispatchEvent(RolesCambiados);
                            modal_editar_rol.hide();
                        }
                        // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
                    })
                    .catch((error) => {
                        // Manejar los errores
                        console.error("Error:", error);
                        // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
                    });
            });

            var form_eliminar = document.getElementById("form-eliminar-rol");

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
                            document.dispatchEvent(RolesCambiados);
                            tabla_miembros.ajax.reload();
                            modal_eliminar_rol.hide();
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
