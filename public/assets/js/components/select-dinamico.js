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
            /*!************************************** *****!*\
          !*** ./resources/js/pages/gridjs.init.js ***!
          \*******************************************/
            /*
        Template Name: Vuesy - Admin & Dashboard Template
        Author: Themesdesign
        Website: https://Themesdesign.in/
        Contact: themesdesign.in@gmail.com
        File: grid Js File
        */

            const selects = {};
            const modals_delete = {};
            const modals_add = {};
            const modals_edit = {};
            const forms_add = document.querySelectorAll(".form-dinamico-add");
            const forms_edit = document.querySelectorAll(".form-dinamico-edit");
            const forms_delete = document.querySelectorAll(
                ".form-dinamico-delete"
            );

            var elementos = document.querySelectorAll(".select-dinamico");

            // Iterar sobre cada elemento y imprimir su id
            elementos.forEach(function (elemento) {
                //console.log(elemento.id);
                //elemento.getAttribute("data-url")
                modals_delete[elemento.id] = new bootstrap.Modal(
                    "#modal-eliminar-" + elemento.getAttribute("data-url")
                );
                var modal_delete = document.getElementById(
                    "modal-eliminar-" + elemento.getAttribute("data-url")
                );
                modal_delete.addEventListener("show.bs.modal", (event) => {
                    if (elemento.value == "No") {
                        event.preventDefault();
                    }
                });
                modals_add[elemento.id] = new bootstrap.Modal(
                    "#modal-agregar-" + elemento.getAttribute("data-url")
                );

                modals_edit[elemento.id] = new bootstrap.Modal(
                    "#modal-editar-" + elemento.getAttribute("data-url")
                );
                var modal_edit = document.getElementById(
                    "modal-editar-" + elemento.getAttribute("data-url")
                );
                modal_edit.addEventListener("show.bs.modal", (event) => {
                    if (elemento.value == "No") {
                        event.preventDefault();
                    }
                });
                var modal_add = document.getElementById(
                    "modal-agregar-" + elemento.getAttribute("data-url")
                );

                if (elemento.getAttribute("data-url") == "almacenes") {
                    elemento.addEventListener("change", (event) => {
                        cargarOpciones("racks");
                        if (
                            document.getElementById("almacenes").value != "No"
                        ) {
                            document
                                .getElementById("form-add-racks")
                                .setAttribute(
                                    "data-almacen",
                                    document.getElementById("almacenes").value
                                );
                        }
                    });
                }
                if (elemento.getAttribute("data-url") == "almacenes") {
                    elemento.addEventListener("change", (event) => {
                        cargarOpciones("racks");
                        if (
                            document.getElementById("almacenes").value != "No"
                        ) {
                            document
                                .getElementById("form-add-racks")
                                .setAttribute(
                                    "data-almacen",
                                    document.getElementById("almacenes").value
                                );
                        }
                    });
                }
                if (elemento.getAttribute("data-url") == "productos") {
                    elemento.addEventListener("change", (event) => {
                        var id = event.target.value;
                        fetch("get-producto/" + id)
                            .then((response) => response.json())
                            .then((data) => {
                                document.getElementById(
                                    "tipo-unidad-producto"
                                ).value = data.tipo_unidad;
                                document.getElementById(
                                    "cantidad-producto"
                                ).value = data.cantidad;
                            });
                    });
                }
                if (elemento.getAttribute("data-url") == "racks") {
                    modal_add.addEventListener("show.bs.modal", (event) => {
                        if (
                            document.getElementById("almacenes").value == "No"
                        ) {
                            event.preventDefault();
                        }
                    });
                    elemento.addEventListener("change", (event) => {
                        cargarOpciones("estantes");
                        if (document.getElementById("racks").value != "No") {
                            document
                                .getElementById("form-add-estantes")
                                .setAttribute(
                                    "data-rack",
                                    document.getElementById("racks").value
                                );
                        }
                    });
                }
                if (elemento.getAttribute("data-url") == "estantes") {
                    modal_add.addEventListener("show.bs.modal", (event) => {
                        if (document.getElementById("racks").value == "No") {
                            event.preventDefault();
                        }
                    });
                }
                if (elemento.getAttribute("data-url") == "proveedores") {
                    modal_add.addEventListener("show.bs.modal", (event) => {
                        var inputElement = document.createElement("input");
                        var labelElement = document.createElement("label");
                        var divElement = document.createElement("div");
                        divElement.id = "numero_proveedor_input";
                        // Agregar las clases necesarias
                        inputElement.className = "form-control mt-2";
                        labelElement.className = "mt-2";
                        // Establecer el tipo, el id, el name y el placeholder
                        inputElement.type = "text";

                        inputElement.name = "numero";
                        labelElement.innerText = "Número"; // Puedes cambiar el placeholder según tus necesidades
                        divElement.appendChild(labelElement);
                        divElement.appendChild(inputElement);
                        document
                            .querySelector(
                                "#modal-agregar-proveedores .modal-body"
                            )
                            .appendChild(divElement);
                    });
                    modal_add.addEventListener("hide.bs.modal", (event) => {
                        document
                            .getElementById("numero_proveedor_input")
                            .remove();
                    });
                }
                cargarOpciones(elemento.id);
            });

            function cargarOpciones(selectId, id_seleccionado = null) {
                var select = document.getElementById(selectId);
                var ruta = select.getAttribute("data-url");
                var isChoice = select.getAttribute("data-choice");

                if (isChoice == null) {
                    // El select aún no tiene instanciado Choices.js, entonces cargar las opciones
                    fetch("get-" + ruta)
                        .then((response) => response.json())
                        .then((data) => {
                            // Crear un array para almacenar las opciones
                            var options = [];

                            // Agregar la opción predeterminada
                            options.push({ value: "No", label: "Ninguno" });

                            // Agregar las opciones obtenidas del JSON
                            data.forEach((option) => {
                                if (ruta == "racks") {
                                    if (
                                        option.id_almacenes ==
                                        document.getElementById("almacenes")
                                            .value
                                    ) {
                                        options.push({
                                            value: option.id,
                                            label: option.nombre,
                                        });
                                    }
                                } else if (ruta == "proveedores") {
                                    options.push({
                                        value: option.id,
                                        label:
                                            option.nombre +
                                            " - " +
                                            option.numero,
                                    });
                                } else if (ruta == "productos") {
                                    options.push({
                                        value: option.id,
                                        label:
                                            option.nombre +
                                            " - " +
                                            option.codigo,
                                    });
                                } else if (ruta == "estantes") {
                                    if (
                                        option.id_racks ==
                                        document.getElementById("racks").value
                                    ) {
                                        options.push({
                                            value: option.id,
                                            label: option.nombre,
                                        });
                                    }
                                } else {
                                    options.push({
                                        value: option.id,
                                        label: option.nombre,
                                    });
                                }
                            });

                            // Inicializar el select con Choices.js y las opciones obtenidas
                            selects[selectId] = new Choices(select, {
                                choices: options,
                                searchEnabled: true, // Opcional: habilitar la búsqueda
                                shouldSort: false,
                                renderChoiceLimit: -1,
                                itemSelectText: "",
                                // Otras opciones de configuración de Choices.js según sea necesario
                            });
                            /* document
                                .getElementById(selectId)
                                .dispatchEvent(new Event("change"));*/
                        });
                } else {
                    // El select ya tiene instanciado Choices.js, entonces actualizar las opciones

                    fetch("get-" + ruta)
                        .then((response) => response.json())
                        .then((data) => {
                            // Crear un array para almacenar las opciones
                            var options = [];

                            // Agregar la opción predeterminada
                            options.push({
                                value: "No",
                                label: "Ninguno",
                                selected:
                                    id_seleccionado == null ? true : false,
                            });

                            // Agregar las opciones obtenidas del JSON
                            data.forEach((option) => {
                                if (ruta == "racks") {
                                    if (
                                        option.id_almacenes ==
                                        document.getElementById("almacenes")
                                            .value
                                    ) {
                                        options.push({
                                            value: option.id,
                                            label: option.nombre,
                                            selected:
                                                id_seleccionado != null &&
                                                option.id == id_seleccionado
                                                    ? true
                                                    : false,
                                        });
                                    }
                                } else if (ruta == "estantes") {
                                    if (
                                        option.id_racks ==
                                        document.getElementById("racks").value
                                    ) {
                                        options.push({
                                            value: option.id,
                                            label: option.nombre,
                                            selected:
                                                id_seleccionado != null &&
                                                option.id == id_seleccionado
                                                    ? true
                                                    : false,
                                        });
                                    }
                                } else if (ruta == "proveedores") {
                                    options.push({
                                        value: option.id,
                                        label:
                                            option.nombre +
                                            " - " +
                                            option.numero,
                                    });
                                } else if (ruta == "productos") {
                                    options.push({
                                        value: option.id,
                                        label:
                                            option.nombre +
                                            " - " +
                                            option.codigo,
                                    });
                                } else {
                                    options.push({
                                        value: option.id,
                                        label: option.nombre,
                                        selected:
                                            id_seleccionado != null &&
                                            option.id == id_seleccionado
                                                ? true
                                                : false,
                                    });
                                }
                            });

                            // Actualizar las opciones del select con Choices.js

                            selects[selectId].setChoices(
                                options,
                                "value",
                                "label",
                                true
                            ); // true para limpiar las opciones existentes
                            document
                                .getElementById(selectId)
                                .dispatchEvent(new Event("change"));
                        });
                }
            }

            forms_add.forEach((form) => {
                form.addEventListener("submit", (event) => {
                    event.preventDefault();

                    // Obtener la acción del formulario
                    var action = form.action;
                    var id = form.getAttribute("data-select");
                    // Serializar los datos del formulario
                    const formData = new FormData(form);

                    if (id == "racks") {
                        formData.append(
                            "id_almacenes",
                            form.getAttribute("data-almacen")
                        );
                    }
                    if (id == "estantes") {
                        formData.append(
                            "id_racks",
                            form.getAttribute("data-rack")
                        );
                    }

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
                                cargarOpciones(id);
                                form.querySelector(
                                    "input[name='nombre']"
                                ).value = "";
                                modals_add[id].hide();
                            }
                            // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
                        })
                        .catch((error) => {
                            // Manejar los errores
                            console.error("Error:", error);
                            // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
                        });
                });
            });
            forms_edit.forEach((form) => {
                form.addEventListener("submit", (event) => {
                    event.preventDefault();

                    // Obtener la acción del formulario

                    var id = form.getAttribute("data-select");
                    var element_id = document.getElementById(id).value;
                    // Serializar los datos del formulario

                    var action = form.action + "/" + element_id;
                    var csrfToken = document.querySelector(
                        'input[name="_token"]'
                    ).value;
                    var nuevoNombre = form.querySelector(
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
                                        data.errors[atributo].forEach(function (
                                            elemento,
                                            indice
                                        ) {
                                            alert(elemento);
                                        });
                                    }
                                }
                            } else {
                                alert(data.message);
                                cargarOpciones(id);
                                form.querySelector(
                                    "input[name='nombre']"
                                ).value = "";
                                modals_edit[id].hide();
                            }
                            // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
                        })
                        .catch((error) => {
                            // Manejar los errores
                            console.error("Error:", error);
                            // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
                        });
                });
            });
            forms_delete.forEach((form) => {
                form.addEventListener("submit", (event) => {
                    event.preventDefault();

                    // Obtener la acción del formulario

                    var id = form.getAttribute("data-select");
                    var element_id = document.getElementById(id).value;
                    var action = form.action + "/" + element_id;
                    var csrfToken = document.querySelector(
                        'input[name="_token"]'
                    ).value;

                    fetch(action, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                    })
                        .then((response) => {
                            return response.json();
                        })
                        .then((data) => {
                            // Manejar la respuesta JSON

                            alert(data.message);
                            cargarOpciones(id);
                            modals_delete[id].hide();
                            // Aquí puedes hacer algo con la respuesta, como mostrar un mensaje de éxito o actualizar la interfaz de usuario
                        })
                        .catch((error) => {
                            // Manejar los errores
                            console.error("Error:", error);
                            // Aquí puedes mostrar un mensaje de error al usuario o realizar alguna acción específica
                        });
                });
            });
            /******/
        })();
        /******/
    })();
    /******/
})();
